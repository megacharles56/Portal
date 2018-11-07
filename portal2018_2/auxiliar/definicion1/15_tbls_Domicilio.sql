/**************************** Tipos de asentamiento ***************************/ 
Create Table tipos_Asentamiento(tasen_Id Tid Constraint tasen_Id_NN Not Null
                                             Constraint Tasen_key Primary Key,
                               tasen_Nombre tsNombreL
                                             Constraint tasen_Nombre_NN Not Null);
Create Generator Tasen_Id_Gen;
Commit work;

Set term ^; 
Create trigger 
   Alta_tasen For tipos_Asentamiento
   Active Before Insert
   as 
       Begin
       If (New.tasen_Id Is null) Then
          New.tasen_Id = Gen_id(tasen_Id_Gen,1);
       End ;
^
Commit work^
Create Procedure tasen_Key_Gen 
   Returns( Avalue Integer)
      As
         Begin
         aValue = Gen_id(tasen_Id_Gen,1);
         End
^
Commit work^
set term ; ^

Grant all on tipos_Asentamiento To Public;
Grant Execute on Procedure tasen_Key_Gen  To Public;

INSERT INTO tipos_Asentamiento (tasen_id, tasen_Nombre) VALUES ('01', 'Aeropuerto');
INSERT INTO tipos_Asentamiento (tasen_id, tasen_Nombre) VALUES ('02', 'Barrio');
INSERT INTO tipos_Asentamiento (tasen_id, tasen_Nombre) VALUES ('04', 'Campamento');
INSERT INTO tipos_Asentamiento (tasen_id, tasen_Nombre) VALUES ('08', 'Ciudad');
INSERT INTO tipos_Asentamiento (tasen_id, tasen_Nombre) VALUES ('09', 'Colonia');
INSERT INTO tipos_Asentamiento (tasen_id, tasen_Nombre) VALUES ('10', 'Condominio');
INSERT INTO tipos_Asentamiento (tasen_id, tasen_Nombre) VALUES ('11', 'Congregación');
INSERT INTO tipos_Asentamiento (tasen_id, tasen_Nombre) VALUES ('12', 'Conjunto habitacional');
INSERT INTO tipos_Asentamiento (tasen_id, tasen_Nombre) VALUES ('15', 'Ejido');
INSERT INTO tipos_Asentamiento (tasen_id, tasen_Nombre) VALUES ('16', 'Estación');
INSERT INTO tipos_Asentamiento (tasen_id, tasen_Nombre) VALUES ('17', 'Equipamiento');
INSERT INTO tipos_Asentamiento (tasen_id, tasen_Nombre) VALUES ('18', 'Exhacienda');
INSERT INTO tipos_Asentamiento (tasen_id, tasen_Nombre) VALUES ('20', 'Finca');
INSERT INTO tipos_Asentamiento (tasen_id, tasen_Nombre) VALUES ('21', 'Fraccionamiento');
INSERT INTO tipos_Asentamiento (tasen_id, tasen_Nombre) VALUES ('22', 'Gran usuario');
INSERT INTO tipos_Asentamiento (tasen_id, tasen_Nombre) VALUES ('23', 'Granja');
INSERT INTO tipos_Asentamiento (tasen_id, tasen_Nombre) VALUES ('24', 'Hacienda');
INSERT INTO tipos_Asentamiento (tasen_id, tasen_Nombre) VALUES ('25', 'Ingenio');
INSERT INTO tipos_Asentamiento (tasen_id, tasen_Nombre) VALUES ('26', 'Parque industrial');
INSERT INTO tipos_Asentamiento (tasen_id, tasen_Nombre) VALUES ('27', 'Poblado comunal');
INSERT INTO tipos_Asentamiento (tasen_id, tasen_Nombre) VALUES ('28', 'Pueblo');
INSERT INTO tipos_Asentamiento (tasen_id, tasen_Nombre) VALUES ('29', 'Ranchería');
INSERT INTO tipos_Asentamiento (tasen_id, tasen_Nombre) VALUES ('30', 'Residencial');
INSERT INTO tipos_Asentamiento (tasen_id, tasen_Nombre) VALUES ('31', 'Unidad habitacional');
INSERT INTO tipos_Asentamiento (tasen_id, tasen_Nombre) VALUES ('32', 'Villa');
INSERT INTO tipos_Asentamiento (tasen_id, tasen_Nombre) VALUES ('33', 'Zona comercial');
INSERT INTO tipos_Asentamiento (tasen_id, tasen_Nombre) VALUES ('34', 'Zona federal');
INSERT INTO tipos_Asentamiento (tasen_id, tasen_Nombre) VALUES ('37', 'Zona industrial');
INSERT INTO tipos_Asentamiento (tasen_id, tasen_Nombre) VALUES ('38', 'Ampliación');
INSERT INTO tipos_Asentamiento (tasen_id, tasen_Nombre) VALUES ('39', 'Club de golf');
INSERT INTO tipos_Asentamiento (tasen_id, tasen_Nombre) VALUES ('40', 'Puerto');
INSERT INTO tipos_Asentamiento (tasen_id, tasen_Nombre) VALUES ('45', 'Paraje');
INSERT INTO tipos_Asentamiento (tasen_id, tasen_Nombre) VALUES ('47', 'Zona militar');
INSERT INTO tipos_Asentamiento (tasen_id, tasen_Nombre) VALUES ('48', 'Rancho');


/******************************Estados_Republica******************************/ 
Create Table Estados_Republica(Esrep_Id Tid Constraint Esrep_Id_NN Not Null
                                             Constraint Esrep_key Primary Key,
                               Esrep_Estado tsNombreL
                                             Constraint EsRep_Esatado_NN Not Null);
 
Create Generator Esrep_Id_Gen;
Commit work;

Set term ^; 
Create trigger 
   Alta_EsRep For Estados_Republica
   Active Before Insert
   as 
       Begin
       If (New.EsRep_Id Is null) Then
          New.EsRep_Id = Gen_id(EsRep_Id_Gen,1);
       End ;
^
Commit work^
Create Procedure EsRep_Key_Gen 
   Returns( Avalue Integer)
      As
         Begin
         aValue = Gen_id(EsRep_Id_Gen,1);
         End
^
Commit work^

set term ; ^

Grant all on Estados_Republica To Public;
Grant Execute on Procedure EsRep_Key_Gen  To Public;
commit;
/****** datos ******/

INSERT INTO Estados_Republica (esRep_ESTADO) VALUES ('Aguascalientes');
INSERT INTO Estados_Republica (esRep_ESTADO) VALUES ('Baja California');
INSERT INTO Estados_Republica (esRep_ESTADO) VALUES ('Baja California Sur');
INSERT INTO Estados_Republica (esRep_ESTADO) VALUES ('Campeche');
INSERT INTO Estados_Republica (esRep_ESTADO) VALUES ('Coahuila de Zaragoza');
INSERT INTO Estados_Republica (esRep_ESTADO) VALUES ('Colima');
INSERT INTO Estados_Republica (esRep_ESTADO) VALUES ('Chiapas');
INSERT INTO Estados_Republica (esRep_ESTADO) VALUES ('Chihuahua');
INSERT INTO Estados_Republica (esRep_ESTADO) VALUES ('Distrito Federal');
INSERT INTO Estados_Republica (esRep_ESTADO) VALUES ('Durango');
INSERT INTO Estados_Republica (esRep_ESTADO) VALUES ('Guanajuato');
INSERT INTO Estados_Republica (esRep_ESTADO) VALUES ('Guerrero');
INSERT INTO Estados_Republica (esRep_ESTADO) VALUES ('Hidalgo');
INSERT INTO Estados_Republica (esRep_ESTADO) VALUES ('Jalisco');
INSERT INTO Estados_Republica (esRep_ESTADO) VALUES ('México');
INSERT INTO Estados_Republica (esRep_ESTADO) VALUES ('Michoacán de Ocampo');
INSERT INTO Estados_Republica (esRep_ESTADO) VALUES ('Morelos');
INSERT INTO Estados_Republica (esRep_ESTADO) VALUES ('Nayarit');
INSERT INTO Estados_Republica (esRep_ESTADO) VALUES ('Nuevo León');
INSERT INTO Estados_Republica (esRep_ESTADO) VALUES ('Oaxaca');
INSERT INTO Estados_Republica (esRep_ESTADO) VALUES ('Puebla');
INSERT INTO Estados_Republica (esRep_ESTADO) VALUES ('Querétaro');
INSERT INTO Estados_Republica (esRep_ESTADO) VALUES ('Quintana Roo');
INSERT INTO Estados_Republica (esRep_ESTADO) VALUES ('San Luis Potosí');
INSERT INTO Estados_Republica (esRep_ESTADO) VALUES ('Sinaloa');
INSERT INTO Estados_Republica (esRep_ESTADO) VALUES ('Sonora');
INSERT INTO Estados_Republica (esRep_ESTADO) VALUES ('Tabasco');
INSERT INTO Estados_Republica (esRep_ESTADO) VALUES ('Tamaulipas');
INSERT INTO Estados_Republica (esRep_ESTADO) VALUES ('Tlaxcala');
INSERT INTO Estados_Republica (esRep_ESTADO) VALUES ('Veracruz de Ignacio de la Llave');
INSERT INTO Estados_Republica (esRep_ESTADO) VALUES ('Yucatán');
INSERT INTO Estados_Republica (esRep_ESTADO) VALUES ('Zacatecas');

commit;
/***************************************************************************/
Create Table importCP(impcp_Id Tid Constraint import_Id_NN Not Null
                                           Constraint import_key Primary Key,
      d_codigo varchar(5),  
      d_asenta tsnombreLP,  
      D_mnpio tsnombreLP,  
      c_estado     tid
                     Constraint impcp_lnk_esrep_Id
                        References Estados_Republica(EsRep_Id)
                            on Delete Cascade
                      on Update Cascade,
      c_tipo_asenta tid
                     Constraint impcp_lnk_tasen_Id
                        References tipos_Asentamiento(tasen_Id)
                            on Delete Cascade
                      on Update Cascade  
);
commit;
CREATE INDEX IDX_IMPORTCP1 ON IMPORTCP(D_CODIGO);
  
alter table importcp add constraint unico  Unique (  
d_codigo,   d_asenta, 
d_mnpio ,   c_estado,
c_tipo_asenta);   
 
Create Generator impcp_Id_Gen;
Commit work;

Set term ^; 
Create trigger 
   Alta_import For importCP
   Active Before Insert
   as 
       Begin
       If (New.impcp_Id Is null) Then
          New.impcp_Id = Gen_id(impcp_Id_Gen,1);
       End ;
^
Commit work^
Create Procedure import_Key_Gen 
   Returns( Avalue Integer)
      As
         Begin
         aValue = Gen_id(impcp_Id_Gen,1);
         End
^
Commit work^

set term ; ^

Grant all on importCP To Public;
Grant Execute on Procedure import_Key_Gen  To Public;

/***** vista ****/
create view vCP as 
select a.IMPCP_ID, a.D_CODIGO, a.D_ASENTA, a.D_MNPIO, 
       ta.TASEN_NOMBRE, er.ESREP_ESTADO
 from importcp a   
 join TIPOS_ASENTAMIENTO ta 
   on  a.C_TIPO_ASENTA = ta.TASEN_ID
 join ESTADOS_REPUBLICA er
   on a.C_ESTADO = er.ESREP_ID;
   
/*
Clientes 
Domicilios 
EstadosRepublica 
Importcp 
TiposAsentamiento 
Vcp 
*/
   
/*****************************************************************************/
/******************************Domicilios******************************/
Create Table Domicilios(Domic_Id Tid Constraint Domic_Id_NN Not Null
                                     Constraint Domic_key Primary Key,
                        Domic_calle_numero tsNombreXL
                                     Constraint Domic_calle_numero_NN Not Null, 
                        Domic_Colonia tsNombreLP
                                     Constraint Domic_Colonia_NN Not Null, 
                        import_Id tid
                                     Constraint Domic_import_Id_NN Not Null
                                     Constraint Domic_lnk_import_Id
                                        References importCP
                                            on Delete Cascade
                                            on Update Cascade);
 
Create Generator Domic_Id_Gen;
Commit work;

Set term ^; 
Create trigger 
   Alta_Domic For Domicilios
   Active Before Insert
   as 
       Begin
       If (New.Domic_Id Is null) Then
          New.Domic_Id = Gen_id(Domic_Id_Gen,1);
       End ;
^
Commit work^
Create Procedure Domic_Key_Gen 
   Returns( Avalue Integer)
      As
         Begin
         aValue = Gen_id(Domic_Id_Gen,1);
         End;
^
Commit work^

set term ; ^

Grant all on Domicilios To Public;
Grant Execute on Procedure Domic_Key_Gen  To Public;

/**** vista *****/

create view vDOMICILIOS as  
    SELECT  D.DOMIC_ID,  D.DOMIC_CALLE_NUMERO, D.DOMIC_COLONIA, 
           cp.D_CODIGO, cp.D_MNPIO,           cp.TASEN_NOMBRE, 
           cp.ESREP_ESTADO
      FROM DOMICILIOS d 
      Join vcp cp  
        on d.IMPORT_ID =  cp.IMPCP_ID;
        