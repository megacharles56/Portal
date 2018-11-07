  Create Table Telefonos(telef_Id Tid Constraint telef_Id_NN Not Null
                                     Constraint telef_key Primary Key,
                        Tipo_com  tid 
                                  Constraint tipp_com_NN Not Null
                                  Constraint tipo_com_lnk_Variables
                                          References Variables(varia_id)  
                                                  on Delete Cascade
                                                  on Update Cascade,  
  
                         telef_Prefijo tsNombreC, 
                         telef_LADA tsNombreC, 
                         telef_Numero tsNombreC
                                     Constraint telef_Numero_NN Not Null, 
                         telef_Extension tsNombreC,
                         Pers_id Tid
                                     Constraint telef_Pers_id_NN Not Null            
                                     Constraint telef_lnk_Pers
                                       References Personas
                                       on Delete Cascade
                                       on Update Cascade,
                        
                        telef_Telefono computed by 
                            (  
                               
                            coalesce( telef_Prefijo||'+', '')|| ''|| 
                            coalesce( '('||telef_LADA||')','') || ''||
                            telef_Numero|| 
                            coalesce( 'Ext. '||telef_Extension,'') || ''  )                   
                                       
                                        );
   
  Create Generator telef_Id_Gen;
  Commit work;
  
  Set term ^; 
  Create trigger 
     Alta_Tele For Telefonos
     Active Before Insert
     as 
         Begin
         If (New.telef_Id Is null) Then
            New.telef_Id = Gen_id(telef_Id_Gen,1);
         End ;
  ^
  Commit work^
  Create Procedure telef_Key_Gen 
     Returns( Avalue Integer)
        As
           Begin
           aValue = Gen_id(telef_Id_Gen,1);
           End
  ^
  Commit work^
  
  set term ; ^
  
  Grant all on Telefonos To Public;
  Grant Execute on Procedure telef_Key_Gen  To Public;
  
  /******************************Correos******************************/
  Create Table Correos(Corre_Id Tid Constraint Corre_Id_NN Not Null
                                   Constraint Corre_key Primary Key,
                        Tipo_com  tid 
                                  Constraint tipo_com_Corre_NN Not Null
                                  Constraint tipo_com__Corre_lnk_Variables
                                          References Variables(varia_id)  
                                                  on Delete Cascade
                                                  on Update Cascade,                                                
                       Corre_principal tid, 
                       Corre_Direccion tsNombreL
                                   Constraint Corre_Direccion_NN Not Null, 
                       Corre_Dominio tsNombreL
                                   Constraint Corre_Dominio_NN Not Null, 
                       Corre_Correo computed by 
                            (  lower( Corre_Direccion)||'@'||lower(Corre_dominio)),                             
                       perso_id tid
                                   Constraint Corre_perso_id_NN Not Null
                                   Constraint Corre_lnk_Perso
                                      References Personas
                                            on Delete Cascade
                                            on Update Cascade);
   
  Create Generator Corre_Id_Gen;
  Commit work;
  
  Set term ^; 
  Create trigger 
     Alta_Corr For Correos
     Active Before Insert
     as 
         Begin
         If (New.Corre_Id Is null) Then
            New.Corre_Id = Gen_id(Corre_Id_Gen,1);
         End ;
  ^
  Commit work^
  Create Procedure Corre_Key_Gen 
     Returns( Avalue Integer)
        As
           Begin
           aValue = Gen_id(Corre_Id_Gen,1);
           End
  ^
  Commit work^
  
  set term ; ^
  
  Grant all on Correos To Public;
  Grant Execute on Procedure Corre_Key_Gen  To Public;


