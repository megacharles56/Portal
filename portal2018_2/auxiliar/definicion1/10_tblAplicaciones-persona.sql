Create Table Aplicaciones(Aplic_Id Tid Constraint Apli_Id_Nn Not Null
                                      Constraint Apli_Key Primary Key,
                          Modificacion  Timestamp, 
                          Estad_Id      Tid 
                                  Constraint Aplic_Estad_Id_Nn Not Null 
                                  Constraint Aplic_Lnk_Estad
                                          References Variables (Varia_Id) 
                                                  On Delete Cascade
                                                  On Update Cascade,
                          Autor  Tid  
                                  Constraint Aplic_Lnk_Perso
                                          References Personas (Perso_Id) 
                                                  On Delete Cascade
                                                  On Update Cascade,
                          Aplic_Nombre Tsnombre
                                      Constraint Apli_Nombre_Nn Not Null,
                          Aplic_Version Tsnombre default '1'
                                       );
 
Create Generator Aplic_Id_Gen;
Commit Work;

Set Term ^; 
Create Trigger 
   Alta_Aplic For Aplicaciones
   Active Before Insert
   As 
       Begin
       If (New.Aplic_Id Is Null) Then
          New.Aplic_Id = Gen_Id(Aplic_Id_Gen,1);
       if (new.Modificacion is null ) Then      
         New.Modificacion = Current_Timestamp; 
       End ;
^
Create Trigger 
   Modif_Aplic For Aplicaciones
   Active Before Update
   As
      Begin
       if (new.Modificacion is null ) then   
         New.Modificacion = Current_Timestamp; 
      End;
^
Commit Work^
Create Procedure Aplic_Key_Gen 
   Returns( Avalue Integer)
      As
         Begin
         Avalue = Gen_Id(Aplic_Id_Gen,1);
         End
^
Commit Work^

Set Term ; ^

Grant All On Aplicaciones To Public;
Grant Execute On Procedure Aplic_Key_Gen  To Public;

/******************************Aplicacion_Usuario******************************/
Create Table Aplicacion_Persona(Aplic_Perso_Id Tid Constraint Apli_Usua_Id_Nn Not Null
                                                 Constraint Apli_Usua_Key Primary Key,
                                Modificacion  Timestamp, 
                                Aplic_Id Tid
                                                 Constraint Aplic_Perso_Aplic_Id_Nn Not Null
                                                 Constraint Aplic_Perso_Lnk_Apli_Id
                                  References Aplicaciones
                                    On Delete Cascade
                                    On Update Cascade, 

                                Perso_Id Tid
                                                 Constraint Apli_Usua_Usua_Id_Nn Not Null
                                                 Constraint Aplic_Perso_Lnk_Perso_Id
                                  References Personas
                                    On Delete Cascade
                                    On Update Cascade);
 
Create Generator Aplic_perso_Id_Gen;
Commit Work;

Set Term ^; 
Create Trigger 
   Alta_Aplic_Usua For Aplicacion_Persona
   Active Before Insert
   As 
       Begin
       If (New.Aplic_Perso_Id Is Null) Then
          New.Aplic_Perso_Id = Gen_Id(Aplic_Perso_Id_Gen,1);
       New.Modificacion = Current_Timestamp; 
       End ;
^
Create Trigger 
   Modif_Aplic_Perso For Aplicacion_Persona
   Active Before Update
   As
      Begin
       If (New.Modificacion Is Null) Then
         New.Modificacion = Current_Timestamp; 
      End;
^
Commit Work^
Create Procedure Aplic_Perso_Key_Gen 
   Returns( Avalue Integer)
      As
         Begin
         Avalue = Gen_Id(Aplic_Perso_Id_Gen,1);
         End
^
Commit Work^

Set Term ; ^

Grant All On Aplicacion_Persona To Public;
Grant Execute On Procedure Aplic_Perso_Key_Gen  To Public;


/* datos */
INSERT INTO APLICACIONES ( ESTAD_ID, AUTOR, APLIC_NOMBRE)
     SELECT v.varia_id ,1,  
            'SISTEMAS' 
       from variables v 
      where v.VARIA_CAMPO ='ESTADO' 
        and v.VARIA_CADENA = 'ACTIVO'; 
