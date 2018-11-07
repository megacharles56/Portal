/******************************Avisos_Correo******************************/
Create Table Avisos_Correo(avCor_Id Tid Constraint avCor_Id_NN Not Null
                                         Constraint avCor_key Primary Key,
                           avCor_subject tsNombreL, 
                           avCor_from tsNombreL, 
                           avCor_tabla tsNombreL, 
                           avCor_campo tsNombreL, 
                           avCor_event tsNombreL,
                           avCor_message tsNombre2X );
 
Create Generator avCor_Id_Gen;
Commit work;

Set term ^; 
Create trigger 
   Alta_avCor For Avisos_Correo
   Active Before Insert
   as 
       Begin
       If (New.avCor_Id Is null) Then
          New.avCor_Id = Gen_id(avCor_Id_Gen,1);
       End ;
^
Commit work^
Create Procedure avCor_Key_Gen 
   Returns( Avalue Integer)
      As
         Begin
         aValue = Gen_id(avCor_Id_Gen,1);
         End
^
Commit work^                                                                                                                

set term ; ^

Grant all on Avisos_Correo To Public;
Grant Execute on Procedure avCor_Key_Gen  To Public;
/******************************Avisos_Correo_To******************************/
Create Table Avisos_Correo_To(avCTo_Id Tid Constraint avCTo_Id_NN Not Null
                                           Constraint avCTo_key Primary Key,
                              avCor_Id tid
                                           Constraint avCTo_avCor_Id_NN Not Null
                                           Constraint avCTo_lnk_avCor_Id
                                              References Avisos_Correo
                                                on Delete Cascade
                                                on Update Cascade, 
                              avCTo_To tsnombreL,
                              PERSO_id TID                                           
                                   Constraint aVcTo_lnk_Pers
                                      References Personas
                                            on Delete Cascade
                                            on Update Cascade
                              check(  ( (perso_id is not null) and 
                                        (avCTo_To is null    )   )  
                                   or ( (perso_id is null) and 
                                        (avCTo_To is not null )       
                                            )                                           
                                           
                                           ));
 
Create Generator avCTo_Id_Gen;
Commit work;

Set term ^; 
Create trigger 
   Alta_avCTo For Avisos_Correo_To
   Active Before Insert
   as 
       Begin
       If (New.avCTo_Id Is null) Then
          New.avCTo_Id = Gen_id(avCTo_Id_Gen,1);
       End ;
^
Commit work^
Create Procedure avCTo_Key_Gen 
   Returns( Avalue Integer)
      As
         Begin
         aValue = Gen_id(avCTo_Id_Gen,1);
         End
^
Commit work^

set term ; ^

Grant all on Avisos_Correo_To To Public;
Grant Execute on Procedure avCTo_Key_Gen  To Public;


/************ vista *********/
create view vAVISOS_CORREO_TO as 
select  coalesce(  p.PERSO_NOMBRE, ac.AVCTO_TO ) Dirigido_a ,AVCTO_id
 from AVISOS_CORREO_to ac 
left join  PERSONAS p
on ac.PERSO_ID = p.perso_id


