/******************************************************************************
     Tablas     
           {01}-Mensajes
/******************************  {01} Mensajes   ******************************/
Create Table Mensajes(mensj_Id Tid  Constraint mens_Id_NN Not Null
                                   Constraint mens_key Primary Key,
                                   
                      Modificacion  Timestamp, 
                      Estad_Id      Tid 
                                  Constraint Mensj_Estad_Id_Nn Not Null 
                                  Constraint Mensj_Lnk_Estad
                                          References Variables (Varia_Id) 
                                                  On Delete Cascade
                                                  On Update Cascade,
                      Autor  Tid  
                                  Constraint Mensj_Lnk_Perso
                                          References Personas (Perso_Id) 
                                                  On Delete Cascade
                                                  On Update Cascade,                                   
                                   
                      mensj_mensaje tsNombreXL
                                  Constraint mens_mensaje_NN Not Null,
                      mensj_Destinatarios tsNombreXL
                                  default '*'
                                  );
 
Create Generator mensj_Id_Gen;
Commit work;

Set term ^; 
Create trigger 
   Alta_mensj For Mensajes
   Active Before Insert
   as 
       Begin
       If (New.mensj_Id Is null) Then
          New.mensj_Id = Gen_id(mensj_Id_Gen,1);
       If (New.modificacion Is null) Then   
          new.modificacion = current_timestamp; 
       End ;
^
Create trigger 
   Modif_mensj For Mensajes
   Active Before update
   As
      Begin
      If (New.modificacion Is null) Then   
         new.modificacion = current_timestamp; 
      End;
^
Commit work^

Create  Trigger 
   Activa_Mensaje For Mensajes 
Active 
After Insert Position 0 
As
   Begin
   Post_Event 'mensaje_Nuevo';
   End;
^
Commit work^

Create Procedure mensj_Key_Gen 
   Returns( Avalue Integer)
      As
         Begin
         aValue = Gen_id(mensj_Id_Gen,1);
         End
^
Commit work^

set term ; ^

Grant all on Mensajes To Public;
Grant Execute on Procedure mensj_Key_Gen  To Public;
