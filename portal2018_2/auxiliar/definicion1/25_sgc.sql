/****************************** Tabla: sgc ******************************/
Create Table sgc( 
                        sgc_id Tid
                                Constraint sgc_id_NN Not Null
                                Constraint sgc_key Primary Key,
                    autor tid 
                        Constraint sgc_autor_Emple_Modif_NN Not Null
                        Constraint sgc_autor_lnk_Perso
                            References Personas(Perso_ID) 
                                on Delete Cascade
                                on Update Cascade,

                        Modificacion  timestamp, 


                    sgc_proceso tid
                        Constraint sgc_proceso_nn Not Null
                        Constraint sgc_acom_lnk_varia_id
                            References variables(varia_id)
                                on Delete Cascade
                                on Update Cascade, 
                    sgc_proceso tsnombrel
                            Constraint sgc_proceso_nn Not Null,
                    sgc_documento tsnombrel
                            constraint sgc_documento_NN Not Null,
                    sgc_documento_url tsnombrel,

                    sgc_clave tsnombrel
                            Constraint sgc_clave_NN Not Null,
                    sgc_revision tsnombrel
                            Constraint sgc_revision_NN Not Null,
                    sgc_fecha date
                                );

/*.............................. GENERADORE(S) ..............................*/
Create Generator sgc_id_Gen;
Commit work;

/*.............................. TRIGGER(S) ..............................*/
Set term ^; 
Create trigger 
  Alta_sgc For sgc
    Active Before Insert
  as 
    Begin
    If (New.sgc_id Is null) Then
      New.sgc_id = Gen_id(sgc_id_gen,1);
    If (New.modificacion Is null) Then 
      New.modificacion = current_timestamp;
    End ;
^

Create trigger 
  Modif_sgc For sgc
    Active Before Update
  as 
    Begin
    If (New.modificacion Is null) Then 
      New.modificacion = current_timestamp;
    End ;
^

Commit work^
/*.............................. PROCEDURE(S) ..............................*/
Create Procedure sgc_key_gen
   Returns( Avalue Integer)
      As
         Begin
         aValue = gen_id(sgc_id_gen,1);
         End
^
Commit work^
set term ; ^

/*.............................. PERMISOS ..............................*/
Grant all on sgc To Public;
Grant Execute on Procedure sgc_Key_Gen  To Public;

/******************************formatos******************************/
Create Table formatos(forma_Id Tid Constraint forma_Id_NN Not Null
                                   Constraint forma_key Primary Key,
                      forma_nombre tsNombrel
                                   Constraint forma_nombre_NN Not Null, 
                      forma_url tsNombrel
                                   forma_url tsNombrel);
 
Create Generator forma_Id_Gen;
Commit work;

Set term ^; 
Create trigger 
   Alta_forma For formatos
   Active Before Insert
   as 
       Begin
       If (New.forma_Id Is null) Then
          New.forma_Id = Gen_id(forma_Id_Gen,1);
       End ;
^
Commit work^
Create Procedure forma_Key_Gen 
   Returns( Avalue Integer)
      As
         Begin
         aValue = Gen_id(forma_Id_Gen,1);
         End
^

set term ; ^

Grant all on formatos To Public;
Grant Execute on Procedure forma_Key_Gen  To Public;


