/****************************** Tabla: CURSOS ******************************/
Create Table cursos( 
                        curso_Id Tid
                                Constraint curso_Id_NN Not Null
                                Constraint curso_key Primary Key,
                          estad_Id    tid 
                                  Constraint EstOr_Estad_id_NN Not Null 
                                  Constraint EstOr_lnk_Variables
                                          References Variables(varia_id)  
                                                  on Delete Cascade
                                                  on Update Cascade,
                        curso_nombre tsNombreL 
                                Constraint curso_nombre_NN Not Null,
                        curso_fecha_inicio Date 
                                Constraint curso_fecha_inicio_NN Not Null,
                        curso_fecha_fin Date 
                                Constraint curso_fecha_fin_NN Not Null,
                        curso_duracion Integer ,
                        curso_facilitador tsNombreL ,
                        curso_empresa tsNombreL );

/*.............................. GENERADORE(S) ..............................*/
Create Generator curso_Id_Gen;
Commit work;

/*.............................. TRIGGER(S) ..............................*/
Set term ^; 
Create trigger 
  Alta_curso For cursos
    Active Before Insert
  as 
    Begin
    If (New.curso_Id Is null) Then
      New.curso_Id = Gen_id(curso_Id_Gen,1);
    End ;
^


Commit work^
/*.............................. PROCEDURE(S) ..............................*/
Create Procedure curso_Key_Gen
   Returns( Avalue Integer)
      As
         Begin
         aValue = Gen_id(curso_Id_Gen,1);
         End
^
Commit work^
set term ; ^

/*.............................. PERMISOS ..............................*/
Grant all on cursos To Public;
Grant Execute on Procedure curso_Key_Gen  To Public;
