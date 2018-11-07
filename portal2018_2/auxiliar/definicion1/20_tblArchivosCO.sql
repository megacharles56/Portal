/******************************arccovos******************************/
Create Table archivosCO(arcco_Id Tid Constraint arcco_Id_NN Not Null
                                   Constraint arcco_key Primary Key,
                      modificacion  timestamp, 
                      arcco_Nombre tsNombre
                                   Constraint arcco_Nombre_NN Not Null, 
                      arcco_archivo blob
                                   Constraint arcco_Archivo_NN Not Null, 
                      SCERD_ID tid
                                   Constraint arcco_SCERD_ID_NN Not Null, 
                      SCERT_ID tid 
                                   Constraint arcco_SCERT_ID_NN Not Null,
                      arcco_NOTAS tsNombreL );
 
Create Generator arcco_Id_Gen;
Commit work;

Set term ^; 
Create trigger 
   Alta_arcco For archivosCO
   Active Before Insert
   as 
       Begin
       If (New.arcco_Id Is null) Then
          New.arcco_Id = Gen_id(arcco_Id_Gen,1);
       new.modificacion = current_timestamp; 
       End ;
^
Create trigger 
   Modif_arcco For archivosCO
   Active Before update
   As
      Begin
         new.modificacion = current_timestamp; 
      End;
^
Commit work^
Create Procedure arcco_Key_Gen 
   Returns( Avalue Integer)
      As
         Begin
         aValue = Gen_id(arcco_Id_Gen,1);
         End
^
Commit work^
set term ; ^
Grant all on archivosCO To Public;
Grant Execute on Procedure arcco_Key_Gen  To Public;


