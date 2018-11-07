/****************************** Tabla: TABULA_CEXTERIOR ******************************/
Create Table tabula_cExterior( 
                        tabce_Id Tid
                                Constraint tabce_Id_NN Not Null
                                Constraint tabce_key Primary Key,
                        autor tid 
                                Constraint tabce_Emple_Modif_NN Not Null
                                Constraint tabce_lnk_Perso
                                        References Personas(Perso_ID) 
                                                on Delete Cascade
                                                on Update Cascade,
                        Modificacion  timestamp, 
                        tabce_del date 
                                Constraint tabce_del_NN Not Null,
                        tabce_al Date 
                                Constraint tabce_al_NN Not Null,
                        tabce_de tMonetario 
                                Constraint tabce_de_NN Not Null,
                        tabce_a tMonetario 
                                Constraint tabce_a_NN Not Null,
                        tabce_costo_normal tMonetario 
                                Constraint tabce_costo_normal_NN Not Null,
                        tabce_costo_urgente tMonetario 
                                Constraint tabce_costo_urgente_NN Not Null,
                        tabce_nombre TSNOMBREXXL
                                
                                );

/*.............................. GENERADORE(S) ..............................*/
Create Generator tabce_Id_Gen;
Commit work;

/*.............................. TRIGGER(S) ..............................*/
Set term ^; 
Create trigger 
  Alta_tabce For tabula_cExterior
    Active Before Insert
  as 
    Begin
    If (New.tabce_Id Is null) Then
      New.tabce_Id = Gen_id(tabce_Id_Gen,1);
    If (New.modificacion Is null) Then 
      New.modificacion = current_timestamp;
    End ;
^

Create trigger 
  Modif_tabce For tabula_cExterior
    Active Before Update
  as 
    Begin
    If (New.modificacion Is null) Then 
      New.modificacion = current_timestamp;
    End ;
^

Commit work^
/*.............................. PROCEDURE(S) ..............................*/
Create Procedure tabce_Key_Gen
   Returns( Avalue Integer)
      As
         Begin
         aValue = Gen_id(tabce_Id_Gen,1);
         End
^
Commit work^
set term ; ^

/*.............................. PERMISOS ..............................*/
Grant all on tabula_cExterior To Public;
Grant Execute on Procedure tabce_Key_Gen  To Public;
