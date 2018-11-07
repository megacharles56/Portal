/******************************Solicitud_certificados******************************/
Create Table Solicitud_certificados(scert_Id Tid Constraint scert_Id_NN Not Null
                                                 Constraint scert_key Primary Key,
                                    estad_Id    tid 
                                            Constraint Scert_Estad_id_NN Not Null 
                                            Constraint Scert_lnk_Variables
                                                    References Variables(varia_id)  
                                                            on Delete Cascade
                                                            on Update Cascade,                 
                                    modificacion  timestamp,
                                    scert_id_www tid, 
                                    Clien_id  tid
                                                 Constraint scert_clien_id_NN Not Null
                                                 Constraint scert_lnk_clien_id
                                                    References Clientes
                                                    on Delete Cascade
                                                    on Update Cascade,
                                    scert_ingreso  date not null,                
                                    scert_Observaciones tsNombreXXL,              2 4
                                    scert_origen  tsNombreC);
 
Create Generator scert_Id_Gen;
Commit work;

Set term ^; 
Create trigger 
   Alta_scert For Solicitud_certificados
   Active Before Insert
   as 
       Begin
       If (New.scert_Id Is null) Then
          New.scert_Id = Gen_id(scert_Id_Gen,1);
       If (new.modificacion is null) then
          NEW.modificacion = current_timestamp; 
       End ;
^
Create trigger 
   Modif_scert For Solicitud_certificados
   Active Before update
   As
      Begin
       If (new.modificacion is null) then
         new.modificacion = current_timestamp; 
      End;
^
Commit work^
Create Procedure scert_Key_Gen 
   Returns( Avalue Integer)
      As
         Begin
         aValue = Gen_id(scert_Id_Gen,1);
         End
^
Commit work^

set term ; ^

Grant all on Solicitud_certificados To Public;
Grant Execute on Procedure scert_Key_Gen  To Public;

/** View **/
create view vSolicitud_certificado as
SELECT a.SCERT_ID,  a.ESTAD_ID, est.VARIA_CADENA estado,  a.MODIFICACION, 
scert_id_www, 
a.CLIEN_ID, cl.CLIEN_RAZON,
scert_ingreso, 
 a.SCERT_OBSERVACIONES
 
FROM SOLICITUD_CERTIFICADOS a
Join Variables Est 
  On a.Estad_Id = Est.Varia_Id
Join CLIENTES cl
  on a.clien_id = cl.CLIEN_ID; 

  /******************************Solicitud_certificado_D******************************/
Create Table Solicitud_certificado_D(Scerd_Id Tid Constraint Scerd_Id_NN Not Null
                                                  Constraint Scerd_key Primary Key,
                                    estad_Id    tid 
                                            Constraint ScerD_Estad_id_NN Not Null 
                                            Constraint ScerD_lnk_Variables
                                                    References Variables(varia_id)  
                                                            on Delete Cascade
                                                            on Update Cascade,
                                     modificacion  timestamp, 
                                     Scerd_factura tsnombreL
                                                  Constraint Scerd_factura_NN Not Null, 
                                     Scerd_Idioma tsnombre
                                                  Constraint Scerd_Idioma_NN Not Null, 
                                     Scerd_caracter tsnombre
                                                  Constraint Scerd_Caracter_NN Not Null, 
                                    scerd_Certificar tsboolean 
                                                 Constraint scert_Certificado Not Null,
                                    scerd_Legalizar tsboolean 
                                                 Constraint scert_Legalizar Not Null,


                                     Scerd_Observaciones tsnombreXXL, 
                                     scert_Id tid
                                                  Constraint Scerd_scert_Id_NN Not Null
                                                  Constraint Scerd_lnk_scert_id
                                     References Solicitud_certificados
                                     on Delete Cascade
                                                           on Update Cascade);
 
Create Generator Scerd_Id_Gen;
Commit work;

Set term ^; 
Create trigger 
   Alta_Scerd For Solicitud_certificado_D
   Active Before Insert
   as 
       Begin
       If (New.Scerd_Id Is null) Then
          New.Scerd_Id = Gen_id(Scerd_Id_Gen,1);
       If (new.modificacion Is null) Then
       new.modificacion = current_timestamp; 
       End ;
^
Create trigger 
   Modif_Scerd For Solicitud_certificado_D
   Active Before update
   As
      Begin
       If (new.modificacion Is null) Then
         new.modificacion = current_timestamp; 
      End;
^                                                                                           
Commit work^
Create Procedure Scerd_Key_Gen 
   Returns( Avalue Integer)
      As
         Begin
         aValue = Gen_id(Scerd_Id_Gen,1);
         End
^
Commit work^

set term ; ^

Grant all on Solicitud_certificado_D To Public;
Grant Execute on Procedure Scerd_Key_Gen  To Public;

/* vista*/
Create Or Alter View Vsolicitud_Certificadod 
As Select 
      A.Scerd_Id,                   A.Estad_Id,      Est.Varia_Cadena Estado,        
      A.Modificacion,               B.Clien_Id,      Cl.Clien_Razon,                 
      A.Scerd_Observaciones ,       A.Scerd_Factura, A.Scerd_Caracter,               
      A.Scerd_Idioma,               A.Scert_Id,      A.Scerd_Certificar,
      B.scert_ingreso,             
      A.Scerd_Legalizar,            B.Scert_Id_Www,  Vce.Certi_Id,                   
      Vce.Estado Estado_Certificado   

From Solicitud_Certificado_D A
Join Solicitud_Certificados B
  On A.Scert_Id = B.Scert_Id
Left Join Vcertificado Vce On A.Scerd_Id =  Vce.Scerd_Id
  
 
Join Variables Est 
  On A.Estad_Id = Est.Varia_Id
Join Clientes Cl
  On B.Clien_Id = Cl.Clien_Id;
commit;


/******************************Receptores******************************/
Create Table Receptores(corec_Id Tid Constraint corec_Id_NN Not Null
                                     Constraint corec_key Primary Key,
                        clien_id tid
                                     Constraint corec_clien_id_NN Not Null
                                     Constraint corec_lnk_Clien_id
                                        References Clientes
                                            on Delete Cascade
                                            on Update Cascade, 
                        corec_Receptor blob
                                     Constraint corec_Receptor_NN Not Null);
 
Create Generator corec_Id_Gen;
Commit work;

Set term ^; 
Create trigger 
   Alta_corec For Receptores
   Active Before Insert
   as 
       Begin
       If (New.corec_Id Is null) Then
          New.corec_Id = Gen_id(corec_Id_Gen,1);
       End
^
Commit work^
Create Procedure corec_Key_Gen 
   Returns( Avalue Integer)
      As
         Begin
         aValue = Gen_id(corec_Id_Gen,1);
         End
^
Commit work^

set term ; ^

Grant all on Receptores To Public;
Grant Execute on Procedure corec_Key_Gen  To Public;
commit;

/****************************** Remitentes ******************************/
Create Table Remitentes(Corem_Id Tid Constraint Corem_Id_NN Not Null
                                     Constraint Corem_key Primary Key,
                        clien_id tid
                                     Constraint Corem_clien_id_NN Not Null
                                     Constraint Corem_lnk_Clien_id
                                        References Clientes
                                            on Delete Cascade
                                            on Update Cascade, 
                        Corem_Remitente blob
                                     Constraint Corem_Remitente_NN Not Null);
 
Create Generator Corem_Id_Gen;
Commit work;

Set term ^; 
Create trigger 
   Alta_Corem For Remitentes
   Active Before Insert
   as 
       Begin
       If (New.Corem_Id Is null) Then
          New.Corem_Id = Gen_id(Corem_Id_Gen,1);
       End
^
Commit work^
Create Procedure Corem_Key_Gen 
   Returns( Avalue Integer)
      As
         Begin
         aValue = Gen_id(Corem_Id_Gen,1);
         End
^
Commit work^

set term ; ^

Grant all on Remitentes To Public;
Grant Execute on Procedure Corem_Key_Gen  To Public;
commit;

/****************************** Consignatarios  ******************************/
  Create Table Consignatarios(CoCon_Id Tid Constraint CoCon_Id_NN Not Null
                                       Constraint CoCon_key Primary Key,
                          clien_id tid
                                         Constraint CoCon_clien_id_NN Not Null
                                       Constraint CoCon_lnk_Clien_id
                                          References Clientes
                                              on Delete Cascade
                                              on Update Cascade, 
                          CoCon_Consignatario blob
                                       Constraint CoCon_Consignatario_NN Not Null);
   
  Create Generator CoCon_Id_Gen;
  Commit work;
  
  Set term ^; 
  Create trigger 
     Alta_CoCon For Consignatarios
     Active Before Insert
     as 
         Begin
         If (New.CoCon_Id Is null) Then
            New.CoCon_Id = Gen_id(CoCon_Id_Gen,1);
         End
  ^
  Commit work^
  Create Procedure CoCon_Key_Gen 
     Returns( Avalue Integer)
        As
           Begin
           aValue = Gen_id(CoCon_Id_Gen,1);
           End
  ^
  Commit work^
  
  set term ; ^
  
  Grant all on Consignatarios To Public;
  Grant Execute on Procedure CoCon_Key_Gen  To Public;
  commit;

/****************************** Lugares_Carga  ******************************/
Create Table Lugares_Carga(coLuC_Id Tid Constraint coLuC_Id_NN Not Null
                                     Constraint coLuC_key Primary Key,
                        clien_id tid
                                     Constraint coLuC_clien_id_NN Not Null
                                     Constraint coLuC_lnk_Clien_id
                                        References Clientes
                                            on Delete Cascade
                                            on Update Cascade, 
                        coLuC_LugarCarga blob
                                     Constraint coLuC_LugarCarga_NN Not Null);
 
Create Generator coLuC_Id_Gen;
Commit work;

Set term ^; 
Create trigger 
   Alta_coLuC For Lugares_Carga
   Active Before Insert
   as 
       Begin
       If (New.coLuC_Id Is null) Then
          New.coLuC_Id = Gen_id(coLuC_Id_Gen,1);
       End
^
Commit work^
Create Procedure coLuC_Key_Gen 
   Returns( Avalue Integer)
      As
         Begin
         aValue = Gen_id(coLuC_Id_Gen,1);
         End
^
Commit work^

set term ; ^

Grant all on Lugares_Carga To Public;
Grant Execute on Procedure coLuC_Key_Gen  To Public;
commit;

/****************************** Destinos  ******************************/
Create Table Destinos(coDes_Id Tid Constraint coDes_Id_NN Not Null
                                     Constraint coDes_key Primary Key,
                        clien_id tid
                                     Constraint coDes_clien_id_NN Not Null
                                     Constraint coDes_lnk_Clien_id
                                        References Clientes
                                            on Delete Cascade
                                            on Update Cascade, 
                        coDes_Destinos blob
                                     Constraint coDes_Destinos_NN Not Null);
 
Create Generator coDes_Id_Gen;
Commit work;

Set term ^; 
Create trigger 
   Alta_coDes For Destinos
   Active Before Insert
   as 
       Begin
       If (New.coDes_Id Is null) Then
          New.coDes_Id = Gen_id(coDes_Id_Gen,1);
       End
^
Commit work^
Create Procedure coDes_Key_Gen 
   Returns( Avalue Integer)
      As
         Begin
         aValue = Gen_id(coDes_Id_Gen,1);
         End
^
Commit work^

set term ; ^

Grant all on Destinos To Public;
Grant Execute on Procedure coDes_Key_Gen  To Public;
commit;

/******************************Certificados******************************/
Create Table Certificados(certi_Id Tid Constraint certi_Id_NN Not Null
                                       Constraint certi_key Primary Key,
                                       
                        Estad_Id      tid 
                                Constraint certi_Estad_id_NN Not Null 
                                Constraint certi_lnk_Estad
                                        References Variables (varia_id) 
                                                on Delete Cascade
                                                on Update Cascade,                                       
                        Autor tid 
                                Constraint certi_autor_NN Not Null
                                Constraint certi_lnk_Perso
                                        References Personas(Perso_ID) 
                                                on Delete Cascade
                                                on Update Cascade,
                        certi_Firma tid 
                                Constraint certi_Firma_NN Not Null
                                Constraint certi_lnk_firma
                                        References Personas(Perso_ID) 
                                        References Variables (varia_id) 
                                                on Delete Cascade
                                                on Update Cascade,
                        certi_Fecha tsNombre 
                                Constraint certi_Fecha_NN Not Null,
                          modificacion  timestamp, 
                          corec_id tid
                                       Constraint certi_lnk_corec_id
                                          References Receptores
                                            on Delete Cascade
                                            on Update Cascade, 
                          Corem_Id tid
                                       Constraint certi_Corem_Id_NN Not Null
                                       Constraint certi_lnk_Corem_Id         
                                          References Remitentes
                                            on Delete Cascade
                                            on Update Cascade, 
                          CoCon_Id tid
                                       Constraint certi_lnk_CoCon_Id
                                          References Consignatarios
                                            on Delete Cascade
                                            on Update Cascade, 
                          coLuC_Id tid
                                       Constraint certi_coLuC_Id_NN Not Null
                                       Constraint certi_lnk_coLuC_Id
                                          References Lugares_Carga
                                            on Delete Cascade
                                            on Update Cascade, 
                          coDes_Id tid
                                       Constraint certi_coDes_Id_NN Not Null
                                       Constraint certi_lnk_coDes_Id
                                          References Destinos
                                            on Delete Cascade
                                            on Update Cascade, 
                          certi_MarcaNumeracion blob, 
                          certi_Descripcion blob, 
                          certi_pesoBruto tsnombreLP, 
                          certi_PesoNeto tsnombreLP, 
                          certi_dimensiones tsnombreLP, 
                          certi_valorFactura blob, 
                          certi_valorEFactura tMonetario
                                       Constraint certi_valorEFactura_NN Not Null, 
                          scerd_id tid
                                       Constraint certi_scerd_id_NN Not Null
                                       Constraint certi_lnk_scerd_id
                          References Solicitud_Certificado_D
                          on Delete Cascade
                                                on Update Cascade);
 
Create Generator certi_Id_Gen;
Commit work;

Set term ^; 
Create trigger 
   Alta_certi For Certificados
   Active Before Insert
   as 
       Begin
       If (New.certi_Id Is null) Then
          New.certi_Id = Gen_id(certi_Id_Gen,1);
       new.modificacion = current_timestamp; 
       End ;
^
Create trigger 
   Modif_certi For Certificados
   Active Before update
   As
      Begin
         new.modificacion = current_timestamp; 
      End;
^
Commit work^
Create Procedure certi_Key_Gen 
   Returns( Avalue Integer)
      As
         Begin
         aValue = Gen_id(certi_Id_Gen,1);
         End
^
Commit work^

set term ; ^

Grant all on Certificados To Public;
Grant Execute on Procedure certi_Key_Gen  To Public;

commit;

/*

                        clien_id tid
                                     Constraint Corem_clien_id_NN Not Null
                                     Constraint Corem_lnk_Clien_id
                                        References Clientes
                                            on Delete Cascade
                                            on Update Cascade, 



alter table Solicitud_certificado_D
        add  scert_Certificar tsboolean
 Constraint scert_Certificado Not Null,
        add scert_Legalizar tsboolean 
 Constraint scert_Legalizar Not Null;
 
 
DROP TRIGGER ALTA_COCONS;
ALTER TABLE CONSIGNATARIOS DROP CONSTRAINT COCONS_LNK_CLIEN_ID;
ALTER TABLE CONSIGNATARIOS DROP CONSTRAINT COCONS_KEY;

drop generator cocons_id_gen;
drop procedure cocons_key_gen;
drop table consignatarios; 


DROP TRIGGER ALTA_COLUC;
ALTER TABLE LUGARESCARGA DROP CONSTRAINT COLUC_LNK_CLIEN_ID;
ALTER TABLE LUGARESCARGA DROP CONSTRAINT COLUC_KEY;

drop generator coluc_id_gen;
drop procedure coluc_key_gen;
drop table LUGARESCARGA; 


alter table Solicitud_certificado_D  drop  scert_Certificar;
alter table Solicitud_certificado_D  drop  scert_Legalizar;
alter table Solicitud_certificado_D  drop  scerd_nivel;

alter table Solicitud_certificado_D  
      add Scerd_caracter tsnombre
      Constraint Scerd_Caracter_NN Not Null, 
 
        add  scerd_Certificar tsboolean
 Constraint scerd_Certificado Not Null,
        add scerd_Legalizar tsboolean 
 Constraint scerd_Legalizar Not Null;
 


create or alter view vCertificados As 
Select     
      Ce.Certi_Id,                    Aut.Perso_nombre  cert_Nombre_Autor,              
      Ce.Estad_Id /**/,               Est.Varia_Cadena Cert_Estado,   
      Ce.Autor,                       Ce.Certi_Firma,                 Ce.Modificacion,                
      Ce.Corec_Id /**/,               Corec.Corec_Receptor,          
      Ce.Corem_Id/**/ ,               Corem.Corem_Remitente,          ce.certi_fecha,          
      Ce.Cocon_Id/**/,                Cocon.Cocon_Consignatario,      
      Ce.Coluc_Id/**/,                Coluc.Coluc_Lugarcarga,         
      Ce.Codes_Id/**/,                Codes.Codes_Destinos,           
      Ce.Certi_Marcanumeracion,       Ce.Certi_Descripcion,           Ce.Certi_Pesobruto,             
      Ce.Certi_Pesoneto,              Ce.Certi_Dimensiones,           Ce.Certi_Valorfactura,          
      Ce.Certi_Valorefactura,         Ce.Scerd_Id,                    
      Vsc.Scerd_Certificar,           Vsc.Scerd_Legalizar,            Vsc.Scerd_Idioma,               
      Vsc.Scerd_Caracter,             Vsc.Scerd_factura,              Vsc.Clien_Razon,                
      Vsc.Scert_Id,Vsc.Scert_Id_Www,  Vsc.Estado Estado_Solicitud    

From Certificados Ce

Join Remitentes Corem
  On Corem.Corem_Id = Ce.Corem_Id
Join Receptores Corec
  On Corec.Corec_Id = Ce.Corec_Id   
Join Consignatarios Cocon   
  On Ce.Cocon_Id = Cocon.Cocon_Id
Join Lugares_Carga Coluc
  On Ce.Coluc_Id = Coluc.Coluc_Id
Join Destinos Codes 
  On Ce.Codes_Id = Codes.Codes_Id
Join Vsolicitud_Certificadod Vsc
  On Ce.Scerd_Id = Vsc.Scerd_Id
Join Variables Est 
  On Ce.Estad_Id = Est.Varia_Id
Left Join Personas Aut 
       On Ce.Autor =  Aut.Perso_Id;
  
  
  
       
*/



   
   ---------------------------
Error
---------------------------
[FireDAC][Phys][FB]Too many Contexts of Relation/Procedure/Views. Maximum allowed is 255.
---------------------------
OK   
---------------------------
