/******************************Clientes******************************/
Create Table Clientes(clien_Id Tid Constraint clien_Id_NN Not Null
                                   Constraint clien_key Primary Key,
                      autor tid 
                              Constraint clien_Emple_Modif_NN Not Null
                              Constraint clien_lnk_Perso
                                      References Personas(Perso_ID) 
                                              on Delete Cascade
                                              on Update Cascade,
                      Modificacion  timestamp,
                      clien_origen tsNombrec, 
                      clien_clave  tsNombre
                              Constraint clien_clave_id_NN Not Null ,
                      clien_Razon tsNombreL
                                   Constraint clien_Razon_NN Not Null, 
                      clien_rfc tsNombre
                                   Constraint clien_rfc_NN Not Null
                                   Constraint clien_rfc_unk unique ,
                      socio_id tid,
                      Domic_Id tid 
                                   Constraint clien_Domic_Id_NN Not Null     
                                   Constraint clien_lnk_Domicilios
                                      References Domicilios
                                        on Delete Cascade
                                        on Update Cascade, 
                      clien_Contacto tsNombreLP
                                   Constraint clien_Contacto_NN Not Null, 
                      clien_puesto tsNombreL
                                   Constraint clien_puesto_NN Not Null,
                      clien_Lada tsNombrec Constraint clien_Lada_NN Not Null,              
                      clien_telefono tsNombre,
                      clien_extension tsNombre,
                      clien_email tsNombre );
 
Create Generator clien_Id_Gen;
Create Generator clien_Folio_Gen;
Commit work;

Set term ^; 
Create trigger 
   Alta_clien For Clientes
   Active Before Insert
   as 
       Begin
       If (New.clien_Id Is null) Then
          New.clien_Id = Gen_id(clien_Id_Gen,1);
       if (new.Modificacion is null) then    
          New.modificacion = current_timestamp; 
       End ;
^
Create trigger 
   Modif_clien For Clientes
   Active Before update
   As
      Begin
      if (new.Modificacion is null) then
         new.modificacion = current_timestamp; 
      End;
^
Commit work^
Create Procedure clien_Key_Gen 
   Returns( Avalue Integer)
      As
         Begin
         aValue = Gen_id(clien_Id_Gen,1);
         End
^
Commit work^

set term ; ^

Grant all on Clientes To Public;
Grant Execute on Procedure clien_Key_Gen  To Public;


create or alter view vClientes as
SELECT C.CLIEN_ID,              p.perso_Nombre Autor, C.MODIFICACION,   
       C.CLIEN_CLAVE,           C.CLIEN_RAZON,           C.socio_id ,          C.CLIEN_RFC,      C.CLIEN_CONTACTO, 
       C.CLIEN_PUESTO,          c.clien_lada,         C.CLIEN_TELEFONO, c.clien_extension, 
       C.CLIEN_EMAIL,           vD.DOMIC_CALLE_NUMERO,   vD.DOMIC_COLONIA,      
       vd.D_CODIGO, vd.D_MNPIO, vd.TASEN_NOMBRE, 
       vd.ESREP_ESTADO
       
FROM CLIENTES c
join vDOMICILIOS vD 
  on vd.Domic_id = c.domic_id
join personas p on C.Autor =  p.perso_id ;
  
  



/*


ALTER TABLE CLIENTES ADD CONSTRAINT CLIEN_LNK_DOMICILIOS
  FOREIGN KEY (DOMIC_ID) REFERENCES DOMICILIOS (DOMIC_ID) ON UPDATE CASCADE ON DELETE CASCADE;


                        clien_Lada tsNombrec Constraint clien_Lada_NN Not Null,              
                      clien_telefono tsNombre,
                      clien_extension tsNombre,
                      alter table clientes drop socio_id;
                      alter table Clientes add Socio_id tid;

drop view vClientes;                      
alter table CLIENTES drop  clien_telefono;
commit;
alter table CLIENTES ADD  clien_telefono tsnombre CONSTRAINT clien_telefono_NN Not Null;
alter table CLIENTES ADD  clien_Lada tsNombrec Constraint clien_Lada_NN Not Null;
alter table CLIENTES add  clien_extension tsNombrec;
alter table clientes drop socio_id;
alter table Clientes add Socio_id tid;
commit;









*/