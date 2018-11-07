  /****************************** Tabla: ESTRUCTURA_ORGANICA ******************************/
  Create Table Estructura_Organica( 
                          EstOr_Id Tid
                                  Constraint EstOr_Id_NN Not Null
                                  Constraint EstOr_key Primary Key,
                          autor tid 
                                  Constraint EstOr_Emple_Modif_NN Not Null
                                  Constraint EstOr_lnk_Perso
                                          References Personas(Perso_ID) 
                                                  on Delete Cascade
                                                  on Update Cascade,
                          Modificacion  timestamp, 
                          estad_Id    tid 
                                  Constraint EstOr_Estad_id_NN Not Null 
                                  Constraint EstOr_lnk_Variables
                                          References Variables(varia_id)  
                                                  on Delete Cascade
                                                  on Update Cascade,
                          EstOr_Nombre tsnombreL 
                                  Constraint EstOr_Nombre_NN Not Null,
                          EstOr_Objetivo tsnombre1x,
                          EstOr_Tipo_Estructura tid 
                                  Constraint EstOr_Tipo_Estructura_NN Not Null
                                  Constraint EstOr_TipoEstr_lnk_Variables
                                          References Variables(varia_id)  
                                                  on Delete Cascade
                                                  on Update Cascade,                        
                         Estco_id tid 
                                  Constraint EstOr_Estco_id_NN Not Null
                                  Constraint Estco_id_lnk_EstCo
                                           References Estructura_Contab
                                                  on Delete Cascade
                                                  on Update Cascade,
                          EstOr_Superior tid 
                                  Constraint EstOr_Superior_lnk_EstOr
                                           References Estructura_Organica(estOr_id)
                                                  on Delete Cascade
                                                  on Update Cascade);
  /* Contraints unique */
   ALTER TABLE Estructura_Organica  
ADD CONSTRAINT tblfld_Estor_unk 
        UNIQUE ( EstOr_Nombre, EstOr_Tipo_Estructura,EstOr_Superior );
  /*.............................. GENERADORE(S) ..............................*/
  Create Generator EstOr_Id_Gen;
  /*.............................. TRIGGER(S) ..............................*/
  Set term ^; 
  Create trigger 
    Alta_EstOr For Estructura_Organica
      Active Before Insert
    as 
      Begin
      new.EstOr_Nombre   = upper(new.EstOr_Nombre);
      new.EstOr_Objetivo = upper(new.EstOr_Objetivo);
      If (New.EstOr_Id Is null) Then
        New.EstOr_Id = Gen_id(EstOr_Id_Gen,1);
      If (New.modificacion Is null) Then 
        New.modificacion = current_timestamp;
      End ;
  ^
  
  Create trigger 
    Modif_EstOr For Estructura_Organica
      Active Before Update
    as 
      Begin
      If (New.modificacion Is null) Then 
        New.modificacion = current_timestamp;
      End ;
  ^
  
  Commit work^
  /*.............................. PROCEDURE(S) ..............................*/
  Create Procedure EstOr_Key_Gen
     Returns( Avalue Integer)
        As
           Begin
           aValue = Gen_id(EstOr_Id_Gen,1);
           End
  ^
  Commit work^
  set term ; ^
  
  /*.............................. PERMISOS ..............................*/
  Grant all on Estructura_Organica To Public;
  Grant Execute on Procedure EstOr_Key_Gen  To Public;
  
  /*............................... VISTAS ...............................*/
  Create View vEstructura_Organica As 
       Select A.Estor_Id, A.autor, A.Modificacion, 
              A.Estad_Id, A.Estor_Nombre, A.Estor_Tipo_Estructura, 
              A.Estco_Id, coalesce(A.Estor_Superior, '' ) Estor_Superior,
              tipo.varia_cadena tipo_estructura,
              Est.Varia_Cadena Estado,
              Aut.Perso_Nombre Nombre_Autor,
              Contab.estco_nombre Estructura_contable,
              tipo.varia_cadena ||' ' ||A.Estor_Nombre  estor_nombre_completo,
              coalesce(tipoRA.varia_cadena ||' ' ||AA.Estor_Nombre,'-')  estor_Sup_nombre_completo
         From Estructura_Organica A
           -- Le reporta a
    left Join Estructura_Organica AA
           On A.estor_Superior = AA.Estor_id
           -- Tipo Estructura le reporta a
    left Join Variables TipoRA 
           On AA.EstOr_Tipo_Estructura = tipoRA.Varia_Id             
           -- estructura contable
         Join Estructura_Contab  contab  
           On A.Estco_Id = contab.Estco_Id
           -- Tipo de Estructura
         Join Variables Tipo 
           On A.EstOr_Tipo_Estructura = tipo.Varia_Id
           -- Estado
         Join Variables Est 
           On A.Estad_Id = Est.Varia_Id
           -- Autor
    Left Join Personas Aut 
           On A.Autor =  Aut.Perso_Id ;

INSERT INTO ESTRUCTURA_ORGANICA (AUTOR, ESTAD_ID, ESTOR_NOMBRE, ESTOR_OBJETIVO, ESTOR_TIPO_ESTRUCTURA, ESTCO_ID, ESTOR_SUPERIOR) VALUES ('1', '1', 'PRESIDENCIA', NULL, '19', '1', NULL);
commit;