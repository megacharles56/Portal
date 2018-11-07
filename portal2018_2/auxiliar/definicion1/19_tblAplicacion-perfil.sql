/******************************APLICACION_PERFIL******************************/
Create Table APLICACION_PERFIL(APPER_Id Tid Constraint APPER_Id_NN Not Null
                                            Constraint APPER_key Primary Key,
                               APLIC_ID tid
                                            Constraint APPER_APLIC_ID_NN Not Null
                                            Constraint APPER_lnk_APLIC_ID
                                               References APLICACIONES
                                                   on Delete Cascade
                                                   on Update Cascade, 
                               PERPU_ID tid
                                            Constraint APPER_PERPU_ID_NN Not Null
                                            Constraint APPER_lnk_PERPU_ID
                                               References PERFILES_PUESTO
                                                   on Delete Cascade
                                                   on Update Cascade);
 
Create Generator APPER_Id_Gen;
Commit work;

Set term ^; 
Create trigger 
   Alta_APPER For APLICACION_PERFIL
   Active Before Insert
   as 
       Begin
       If (New.APPER_Id Is null) Then
          New.APPER_Id = Gen_id(APPER_Id_Gen,1);
       End ;
^
Commit work^
Create Procedure APPER_Key_Gen 
   Returns( Avalue Integer)
      As
         Begin
         aValue = Gen_id(APPER_Id_Gen,1);
         End
^

Commit work^

set term ; ^

Grant all on APLICACION_PERFIL To Public;
Grant Execute on Procedure APPER_Key_Gen  To Public;


