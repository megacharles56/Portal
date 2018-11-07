/****************************** Tabla: ENVIOS_MASIVOS ******************************/
Create Table envios_masivos( 
                        enmas_Id Tid
                                Constraint enmas_Id_NN Not Null
                                Constraint enmas_key Primary Key,
                        autor tid 
                                Constraint enmas_Emple_Modif_NN Not Null
                                Constraint enmas_lnk_Perso
                                        References Personas(perso_ID) 
                                                on Delete Cascade
                                                on Update Cascade,
                        Modificacion  timestamp, 

                        estor_id integer
                                Constraint enmas_estor_NN Not Null
                                Constraint enmas_lnk_estor
                                        References estructura_organica(estor_ID) 
                                                on Delete Cascade
                                                on Update Cascade,

                        enmas_alta Date 
                                Constraint enmas_alta_NN Not Null,
                        enmas_estado tsnombre
                                Constraint enmas_estado_NN Not Null,
                        enmas_nombre tsnombreL
                                Constraint enmas_nombre_NN Not Null,
                        enmas_comentario TSNOMBREXXL
                                );

/*.............................. GENERADORE(S) ..............................*/
Create Generator enmas_Id_Gen;
Commit work;

/*.............................. TRIGGER(S) ..............................*/
Set term ^; 
Create trigger 
  Alta_enmas For envios_masivos
    Active Before Insert
  as 
    Begin
    If (New.enmas_Id Is null) Then
      New.enmas_Id = Gen_id(enmas_Id_Gen,1);
    If (New.modificacion Is null) Then 
      New.modificacion = current_timestamp;
    End ;
^

Create trigger 
  Modif_enmas For envios_masivos
    Active Before Update
  as 
    Begin
    If (New.modificacion Is null) Then 
      New.modificacion = current_timestamp;
    End ;
^

Commit work^
/*.............................. PROCEDURE(S) ..............................*/
Create Procedure enmas_Key_Gen
   Returns( Avalue Integer)
      As
         Begin
         aValue = Gen_id(enmas_Id_Gen,1);
         End
^
Commit work^
set term ; ^

/*.............................. PERMISOS ..............................*/
Grant all on envios_masivos To Public;
Grant Execute on Procedure enmas_Key_Gen  To Public;

