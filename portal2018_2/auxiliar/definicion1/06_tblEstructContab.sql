/****************************** Tabla: ESTRUCTURA_CONTAB ******************************/
Create Table Estructura_Contab( 
                        EstCo_Id Tid
                                Constraint EstCo_Id_NN Not Null
                                Constraint EstCo_key Primary Key,
                        Autor tid 
                                Constraint autor_NN Not Null
                                Constraint EstCo_lnk_Perso
                                        References Personas(Perso_ID) 
                                                on Delete Cascade
                                                on Update Cascade,
                        Modificacion  timestamp, 
                        estad_Id    tid 
                                Constraint EstCo_Estad_id_NN Not Null 
                                Constraint EstCo_lnk_Valores
                                        References Variables(varia_id)
                                                on Delete Cascade
                                                on Update Cascade,
                        EstCo_Nombre tsNombreL 
                                Constraint EstCo_Nombre_unk unique                                                
                                Constraint EstCo_Nombre_NN Not Null,                                                
                        EstCo_Numero integer 
                                Constraint EstCo_Numero_unk unique                                                
                                Constraint EstCo_Numero_NN Not Null);

  /* Contraints unique */
   ALTER TABLE Estructura_Contab  
ADD CONSTRAINT tblfld_Estco_unk 
        UNIQUE ( EstCo_Nombre, EstCo_Numero);

/*.............................. GENERADORE(S) ..............................*/
Create Generator EstCo_Id_Gen;
/*.............................. TRIGGER(S) ..............................*/
Set term ^; 
Create trigger 
  Alta_EstCo For Estructura_Contab
    Active Before Insert
  as 
    Begin
    new.EstCo_Nombre = upper(new.EstCo_Nombre);
    If (New.EstCo_Id Is null) Then
      New.EstCo_Id = Gen_id(EstCo_Id_Gen,1);
    If (New.modificacion Is null) Then 
      New.modificacion = current_timestamp;
    End ;
^

Create trigger 
  Modif_EstCo For Estructura_Contab
    Active Before Update
  as 
    Begin
    new.EstCo_Nombre = upper(new.EstCo_Nombre);
    If (New.modificacion Is null) Then 
      New.modificacion = current_timestamp;
    End ;
^

Commit work^
/*.............................. PROCEDURE(S) ..............................*/
Create Procedure EstCo_Key_Gen
   Returns( Avalue Integer)
      As
         Begin
         aValue = Gen_id(EstCo_Id_Gen,1);
         End
^
Commit work^
set term ; ^

/*.............................. PERMISOS ..............................*/
Grant all on Estructura_Contab To Public;
Grant Execute on Procedure EstCo_Key_Gen  To Public;


/*.............................. Vista   ..............................*/
Create View Vestructura_Contab As 
Select
    A.Estco_Id, A.Autor, A.Modificacion, A.Estad_Id, 
    A.Estco_Nombre, A.Estco_numero,
    Est.Varia_Cadena Estado,
    Aut.Perso_Nombre Nombre_Autor
From Estructura_Contab A
Join Variables Est 
  On A.Estad_Id = Est.Varia_Id
Left Join Personas Aut 
       On A.Autor =  Aut.Perso_Id;

INSERT INTO ESTRUCTURA_CONTAB (AUTOR, MODIFICACION, ESTAD_ID, ESTCO_NOMBRE, ESTCO_NUMERO) VALUES ('1', '24.09.2014, 12:36:13.492', '1', 'PRESIDENCIA', '1');

commit;
