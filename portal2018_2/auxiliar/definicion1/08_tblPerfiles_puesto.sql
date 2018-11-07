/****************************** Tabla: PERFILES_PUESTO ******************************/
Create Table Perfiles_puesto( 
                        perpu_Id Tid
                                Constraint perpu_Id_NN Not Null
                                Constraint perpu_key Primary Key,
                        Reporta_A Tid
                                Constraint perpu_lnk_Perpu
                                        References Perfiles_puesto(perpu_Id) 
                                                on Delete Cascade
                                                on Update Cascade,
                        autor tid 
                                Constraint perpu_Emple_Modif_NN Not Null
                                Constraint perpu_lnk_Perso
                                        References Personas(Perso_ID) 
                                                on Delete Cascade
                                                on Update Cascade,
                        Historia BLOB SUB_TYPE TEXT,
                        Modificacion  timestamp, 
                        estad_Id    tid 
                                Constraint perpu_Estad_id_NN Not Null 
                                Constraint perpu_lnk_variables
                                        References variables (Varia_id) 
                                                on Delete Cascade
                                                on Update Cascade,
                        perpu_nombre tsnombreL 
                                Constraint perpu_nombre_NN Not Null,
                        perpu_complemento tsnombreL,        
                                
                        Estor_Id tid 
                                Constraint perpu_Estor_Id_NN Not Null
                                Constraint perpu_Estor_Id_lnk_EstOr
                                         References Estructura_Organica
                                                on Delete Cascade
                                                on Update Cascade,
                        perpu_genero tid 
                                Constraint perpu_genero_NN Not Null
                                Constraint perpu_genero_lnk_variables
                                         References variables(varia_id)
                                                on Delete Cascade
                                                on Update Cascade,
                        perpu_estado_civil tid 
                                Constraint perpu_estado_civil_NN Not Null
                                Constraint perpu_est_civ_lnk_variables
                                         References variables(varia_id)
                                                on Delete Cascade
                                                on Update Cascade,
                        perpu_Edad_minima integer 
                                Constraint perpu_Edad_minima_NN Not Null,
                        perpu_Edad_Maxima tid 
                                Constraint perpu_Edad_Maxima_NN Not Null,
                        perpu_Expe_interna tsNombre ,
                        perpu_Expe_externa tsNombre ,
                        perpu_Expe_especialidad tsnombreL ,
                        perpu_Escolaridad_Especialidad tsnombreL,

                        perpu_Escolaridad tid 
                                Constraint perpu_Escolar_lnk_variables
                                         References variables(varia_id)
                                                on Delete Cascade
                                                on Update Cascade,
                        perpu_Objetivo tsnombre3x,
                        perpu_nombre_completo computed by (perpu_nombre || ' ' ||coalesce( perpu_complemento,' ')) 
                         );

  /* Contraints unique */
   ALTER TABLE Perfiles_puesto  
ADD CONSTRAINT tblfld_perpu_unk 
        UNIQUE ( perpu_nombre, perpu_complemento);
                                                                              
/*.............................. GENERADORE(S) ..............................*/
Create Generator perpu_Id_Gen;
/*.............................. TRIGGER(S) ..............................*/
Set term ^; 
Create trigger 
  Alta_perpu For Perfiles_puesto
    Active Before Insert
  as 
    Begin
    new.perpu_nombre       = upper( new.perpu_nombre);  
    new.perpu_complemento  = upper( new.perpu_complemento);         
    new.perpu_Expe_interna = upper( new.perpu_Expe_interna); 
    new.perpu_Expe_externa = upper( new.perpu_Expe_externa); 
    new.perpu_Expe_especialidad = upper( new.perpu_Expe_especialidad); 
    new.perpu_Objetivo = upper( new.perpu_Objetivo); 
    If (New.perpu_Id Is null) Then
      New.perpu_Id = Gen_id(perpu_Id_Gen,1);
    If (New.modificacion Is null) Then 
      New.modificacion = current_timestamp;
    End ;
^

Create trigger 
  Modif_perpu For Perfiles_puesto
    Active Before Update
  as 
declare temporal TSNOMBRE3x;
declare crlf char(2);
declare separador  char(2);  
  
    Begin
    new.perpu_nombre       = upper( new.perpu_nombre);  
    new.perpu_complemento  = upper( new.perpu_complemento);         
    new.perpu_Expe_interna = upper( new.perpu_Expe_interna); 
    new.perpu_Expe_externa = upper( new.perpu_Expe_externa); 
    new.perpu_Expe_especialidad = upper( new.perpu_Expe_especialidad); 
    new.perpu_Objetivo = upper( new.perpu_Objetivo); 
    If (New.modificacion Is null) Then 
      New.modificacion = current_timestamp;
      
     Select Temporal, Separador
       From TraeCambio('ESTAD_ID'                       , Old.ESTAD_ID                       , 
                       New.ESTAD_ID                       , :Temporal, :Separador )
       into :Temporal, :Separador; 

     Select Temporal, Separador
       From TraeCambio('Reporta_A'                       , Old.Reporta_A                       , 
                       New.Reporta_A                     , :Temporal, :Separador )
       into :Temporal, :Separador; 

     Select Temporal, Separador
       From TraeCambio('Estor_Id', Old.Estor_Id                       , 
                       New.Estor_Id                       , :Temporal, :Separador )
       into :Temporal, :Separador; 
       
     Select Temporal, Separador                                               
       From TraeCambio('PERPU_NOMBRE', Old.PERPU_NOMBRE                   , 
                       New.PERPU_NOMBRE                   , :Temporal, :Separador )
       into :Temporal, :Separador; 
       
     Select Temporal, Separador
       From TraeCambio('perpu_complemento', Old.perpu_complemento          , 
                       New.perpu_complemento                       , :Temporal, :Separador )
       into :Temporal, :Separador; 
       
    
     Select Temporal, Separador
       From TraeCambio('ESTOR_ID', Old.ESTOR_ID                       , 
                       New.ESTOR_ID                       , :Temporal, :Separador )
       into :Temporal, :Separador; 
     Select Temporal, Separador
       From TraeCambio('PERPU_GENERO', Old.PERPU_GENERO                   , 
                       New.PERPU_GENERO                   , :Temporal, :Separador )
       into :Temporal, :Separador; 
     Select Temporal, Separador
       From TraeCambio('PERPU_ESTADO_CIVIL', Old.PERPU_ESTADO_CIVIL             , 
                       New.PERPU_ESTADO_CIVIL             , :Temporal, :Separador )
       into :Temporal, :Separador; 
     Select Temporal, Separador
       From TraeCambio('PERPU_EDAD_MINIMA', Old.PERPU_EDAD_MINIMA              , 
                       New.PERPU_EDAD_MINIMA              , :Temporal, :Separador )
       into :Temporal, :Separador; 
     Select Temporal, Separador
       From TraeCambio('PERPU_EDAD_MAXIMA', Old.PERPU_EDAD_MAXIMA              , 
                       New.PERPU_EDAD_MAXIMA              , :Temporal, :Separador )
       into :Temporal, :Separador; 
     Select Temporal, Separador
       From TraeCambio('PERPU_EXPE_INTERNA', Old.PERPU_EXPE_INTERNA             , 
                       New.PERPU_EXPE_INTERNA             , :Temporal, :Separador )
       into :Temporal, :Separador; 
     Select Temporal, Separador
       From TraeCambio('PERPU_EXPE_EXTERNA', Old.PERPU_EXPE_EXTERNA             , 
                       New.PERPU_EXPE_EXTERNA             , :Temporal, :Separador )
       into :Temporal, :Separador; 
     Select Temporal, Separador
       From TraeCambio('PERPU_EXPE_ESPECIALIDAD', Old.PERPU_EXPE_ESPECIALIDAD        , 
                       New.PERPU_EXPE_ESPECIALIDAD        , :Temporal, :Separador )
       into :Temporal, :Separador; 
     Select Temporal, Separador
       From TraeCambio('PERPU_ESCOLARIDAD', Old.PERPU_ESCOLARIDAD              , 
                       New.PERPU_ESCOLARIDAD              , :Temporal, :Separador )
       into :Temporal, :Separador; 
     Select Temporal, Separador
       From TraeCambio('PERPU_OBJETIVO', Old.PERPU_OBJETIVO                 , 
                       New.PERPU_OBJETIVO                 , :Temporal, :Separador )
       into :Temporal, :Separador; 
      
         If (( :temporal is not null )  and (:Temporal <> '')) Then 
      Begin 
      Select Historia 
        From GeneraCambios (Old.Modificacion, Old.Autor,  
                            :Temporal,        Old.Historia ) 
        Into New.Historia;
      End  
    End ;
^

Commit work^
/*.............................. PROCEDURE(S) ..............................*/
Create Procedure perpu_Key_Gen
   Returns( Avalue Integer)
      As
         Begin
         aValue = Gen_id(perpu_Id_Gen,1);
         End
^
Commit work^
set term ; ^

/*.............................. PERMISOS ..............................*/
Grant all on Perfiles_puesto To Public;
Grant Execute on Procedure perpu_Key_Gen  To Public;

/* vista */


Create or alter View Vperfiles_Puesto As 
Select A.Perpu_Id,          A.Reporta_A,          A.Autor, 
       A.Historia,          A.Modificacion,       A.Estad_Id, 
       A.Perpu_Nombre,      A.Perpu_Complemento,  A.Estor_Id, 
       A.Perpu_Genero,      A.Perpu_Estado_Civil, A.Perpu_Edad_Minima, 
       A.Perpu_Edad_Maxima, A.Perpu_Expe_Interna, A.Perpu_Expe_Externa, 
       A.Perpu_Expe_Especialidad, 
       A.Perpu_Escolaridad, A.Perpu_Objetivo,     A.Perpu_Nombre_Completo,
       
       Est.Varia_Cadena Estado,   
       Aut.Perso_Nombre Nombre_Autor,
       B.Perpu_Nombre_Completo Nombreperfl_Superior,
       Vo.Estor_Nombre_Completo,
       coalesce(Vo.EstOr_Superior, '') EstOr_Superior,
       coalesce(Vo.Estor_Sup_Nombre_Completo,'') Estor_Sup_Nombre_Completo,
       coalesce(vg.VARIA_CADENA,'') Genero,
       coalesce(vEC.VARIA_CADENA,'') Estado_Civil,
       coalesce(VE.VARIA_CADENA,'') Escolaridad

From Perfiles_Puesto A
left Join Variables vG
  on a.PERPU_GENERO = vg.VARIA_ID
left Join variables vEC
  on a.PERPU_ESTADO_CIVIL = vEC.VARIA_Id
left Join variables vE
  on a.PERPU_ESCOLARIDAD = vE.VARIA_ID

Join Vestructura_Organica Vo
  On A.Estor_Id = Vo.Estor_Id
Left Join Perfiles_Puesto B 
       On A.Reporta_A =  B.Perpu_Id
Join Variables Est 
  On A.Estad_Id = Est.Varia_Id
Left Join Personas Aut 
  On A.Autor =  Aut.Perso_Id  ;

INSERT INTO PERFILES_PUESTO (REPORTA_A, AUTOR, HISTORIA, MODIFICACION, ESTAD_ID, PERPU_NOMBRE, PERPU_COMPLEMENTO, ESTOR_ID, PERPU_GENERO, PERPU_ESTADO_CIVIL, PERPU_EDAD_MINIMA, PERPU_EDAD_MAXIMA, PERPU_EXPE_INTERNA, PERPU_EXPE_EXTERNA, PERPU_EXPE_ESPECIALIDAD, PERPU_ESCOLARIDAD, PERPU_OBJETIVO) VALUES (NULL, '1', NULL, '24.09.2014, 12:36:16.385', '1', 'PRESIDENCIA', '', '1', '18', '15', '50', '70', NULL, NULL, NULL, NULL, NULL);
commit;