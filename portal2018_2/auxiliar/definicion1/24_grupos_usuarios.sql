/****************************** Tabla: GRUPOS_USUARIOS ******************************/
Create Table grupos_usuarios( 
                        grusu_Id Tid
                                Constraint grusu_Id_NN Not Null
                                Constraint grusu_key Primary Key,
                        autor tid 
                                Constraint grusu_Emple_Modif_NN Not Null
                                Constraint grusu_lnk_Perso
                                        References Personas(perso_ID) 
                                                on Delete Cascade
                                                on Update Cascade,
                        Modificacion  timestamp, 
                        grusu_nombre Tsnombre
                                Constraint grusu_nombre_NN Not Null,
                        grusu_comentario TSNOMBREXXL
                                );

/*.............................. GENERADORE(S) ..............................*/
Create Generator grusu_Id_Gen;
Commit work;

/*.............................. TRIGGER(S) ..............................*/
Set term ^; 
Create trigger 
  Alta_grusu For grupos_usuarios
    Active Before Insert
  as 
    Begin
    If (New.grusu_Id Is null) Then
      New.grusu_Id = Gen_id(grusu_Id_Gen,1);
    If (New.modificacion Is null) Then 
      New.modificacion = current_timestamp;
    End ;
^

Create trigger 
  Modif_grusu For grupos_usuarios
    Active Before Update
  as 
    Begin
    If (New.modificacion Is null) Then 
      New.modificacion = current_timestamp;
    End ;
^

Commit work^
/*.............................. PROCEDURE(S) ..............................*/
Create Procedure grusu_Key_Gen
   Returns( Avalue Integer)
      As
         Begin
         aValue = Gen_id(grusu_Id_Gen,1);
         End
^
Commit work^
set term ; ^

/*.............................. PERMISOS ..............................*/
Grant all on grupos_usuarios To Public;
Grant Execute on Procedure grusu_Key_Gen  To Public;


/*************************************************************************/
Create Table aplicacion_Grupos_Usuarios(apli_grus_Id Tid Constraint apli_grus_Id_Nn Not Null
                                                 Constraint apli_grus_Key Primary Key,
                                Modificacion  Timestamp, 
                                aplic_Id Tid
                                                 Constraint apli_grus_aplic_Id_Nn Not Null
                                                 Constraint apli_grus_aplic_Lnk_Apli_Id
                                  References aplicaciones(aplic_id)
                                    On Delete Cascade
                                    On Update Cascade, 

                                grusu_Id Tid
                                                 Constraint Apli_Usua_grusu_Id_Nn Not Null
                                                 Constraint apli_grus_grusu_Lnk_Perso_Id
                                  References Grupos_usuarios (grusu_id)
                                    On Delete Cascade
                                    On Update Cascade);
 
Create Generator apli_grus_Id_Gen;
Commit Work;

Set Term ^; 
Create Trigger 
   alta_apli_grus For aplicacion_Grupos_Usuarios
   Active Before Insert
   As 
       Begin
       If (New.apli_grus_Id Is Null) Then
          New.apli_grus_Id = Gen_Id(apli_grus_Id_Gen,1);
       New.Modificacion = Current_Timestamp; 
       End ;
^
Create Trigger 
   alta_apli_grus For aplicacion_Grupos_Usuarios
   Active Before Update
   As
      Begin
       If (New.Modificacion Is Null) Then
         New.Modificacion = Current_Timestamp; 
      End;
^
Commit Work^

Create Procedure apli_grus_Key_Gen 
   Returns( Avalue Integer)
      As
         Begin
         Avalue = Gen_Id(apli_grus_Id_Gen,1);
         End
^
Commit Work^

Set Term ; ^

Grant All On aplicacion_Grupos_Usuarios To Public;
Grant Execute On Procedure apli_grus_Key_Gen  To Public;






