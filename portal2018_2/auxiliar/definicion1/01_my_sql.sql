Create Table variables( varia_id integer 
                                not null
                                primary key
                                auto_increment,
                        modificacion  timestamp, 
                        varia_tabla varchar(24),
                        varia_campo varchar(24),
                        varia_cadena varchar(64) ,           
                        varia_extra varchar(64),           
                        varia_info varchar(64),           
                        varia_numerico numeric(9,2),
                        varia_fecha date );
-- nota : los constraints unicos de mas de una columna no funcionan
                 
insert  into variables ( varia_tabla, varia_campo, varia_cadena)
 values ( '*',  'ESTADO', 'ACTIVO'  );
insert  into variables ( varia_tabla, varia_campo, varia_cadena)
 values ( '*', 'ESTADO', 'ELIMINADO' );
insert  into variables ( varia_tabla, varia_campo, varia_cadena)
 values ( '*', 'ESTADO', 'ALTA' );
insert  into variables ( varia_tabla, varia_campo, varia_cadena)
 values ( '*', 'ESTADO', 'ENTREGADO' );
insert  into variables ( varia_tabla, varia_campo, varia_cadena)
 values ( '*', 'ESTADO', 'EVALUACION' );
insert  into variables ( varia_tabla, varia_campo, varia_cadena)
 values ( '*', 'ESTADO', 'EN ATENCION' );
insert  into variables ( varia_tabla, varia_campo, varia_cadena)
 values ( '*', 'ESTADO', 'CALIFICADO' );
insert  into variables ( varia_tabla, varia_campo, varia_cadena)
 values ( '*', 'ESTADO', 'SOLICITADO' );
insert  into variables ( varia_tabla, varia_campo, varia_cadena)
 values ( '*', 'ESTADO', 'DENEGADO' );
insert  into variables ( varia_tabla, varia_campo, varia_cadena)
 values ( '*', 'GENERO', 'MASCULINO' );
insert  into variables ( varia_tabla, varia_campo, varia_cadena)
 values ( '*', 'GENERO', 'FEMENINO' );
insert  into variables ( varia_tabla, varia_campo, varia_cadena)
 values ( '*', 'GENERO', 'INDISTINTO' ); 
insert  into variables ( varia_tabla, varia_campo, varia_cadena)
 values ( '*', 'ESTADO CIVIL', 'CASADO' );
insert  into variables ( varia_tabla, varia_campo, varia_cadena)
 values ( '*', 'ESTADO CIVIL', 'SOLTERO' );
insert  into variables ( varia_tabla, varia_campo, varia_cadena)
 values ( '*', 'ESTADO CIVIL', 'INDISTINTO' );
insert  into variables ( varia_tabla, varia_campo, varia_cadena)
 values ( '*', 'EDUCACION', 'BASICA' );
insert  into variables ( varia_tabla, varia_campo, varia_cadena)
 values ( '*', 'EDUCACION', 'MEDIA SUPERIOR' );
insert  into variables ( varia_tabla, varia_campo, varia_cadena)
 values ( '*', 'EDUCACION', 'SUPERIOR' );
insert  into variables ( varia_tabla, varia_campo, varia_cadena)
 values ( 'ESTRUCTURA_ORGANICA', 'ESTOR_TIPO_ESTRUCTURA', 'DIRECCIóN' );
insert  into variables ( varia_tabla, varia_campo, varia_cadena)
 values ( 'ESTRUCTURA_ORGANICA', 'ESTOR_TIPO_ESTRUCTURA', 'GERENCIA' ); 
insert  into variables ( varia_tabla, varia_campo, varia_cadena)
 values ( 'ESTRUCTURA_ORGANICA', 'ESTOR_TIPO_ESTRUCTURA', 'DEPARTAMENTO' );
insert  into variables ( varia_tabla, varia_campo, varia_cadena)
 values ( 'ESTRUCTURA_ORGANICA', 'ESTOR_TIPO_ESTRUCTURA', 'JEFATURA' );                 
 
 
 ------------------------------------------------------------------------------
create table personas( 
                        perso_id      integer
                                not null
                                primary key auto_increment,
                        modificacion  timestamp, 
                        estad_id      integer not null 
                                        references variables (varia_id) 
                                                on delete cascade
                                                on update cascade,
                        autor  integer  
                                        references personas (perso_id) 
                                                on delete cascade
                                                on update cascade,
                        historia blob,
                        perso_nombre1 varchar(24) not null,
                        perso_nombre2 varchar(24) ,
                        perso_nombre3 varchar(24) ,
                        perso_paterno varchar(24) not null,
                        perso_materno varchar(24) ,
                        perso_titulo  varchar(24) ,
                        perso_sobrenombre varchar(24) ,
                        perso_rfc     char(13) unique,
                        perso_curp    char(18) unique,
                        perso_nacionalidad varchar(24),
                        perso_fecha_nacimiento  date,  
                        perso_sexo  varchar(12),
                        domic_id  integer  
                                        references domicilios (domic_id) 
                                                on delete cascade
                                                on update cascade                        
                        );
                        

create view vperson as 
select a.perso_id,           a.modificacion,
       a.estad_id,           a.autor,
       a.historia,           a.perso_nombre1,
       a.perso_nombre2,      a.perso_nombre3, 
       a.perso_paterno,      a.perso_materno, 
       a.perso_titulo,       a.perso_sobrenombre, 
       a.perso_rfc,          a.perso_curp, 
       
       a.perso_nombre1 || coalesce( a.perso_nombre2, '') ||
                          coalesce( a.perso_nombre3 , '')|| ' ' ||  
       a.perso_paterno || coalesce( a.perso_materno, '') perso_nombre, 
       a.perso_nacionalidad,
       a.perso_fecha_nacimiento,   a.perso_sexo,  
       est.varia_cadena estado
from personas a
join variables est 
  on a.estad_id = est.varia_id;
  
create view vpersonas as 
select a.perso_id,           a.modificacion,
       a.estad_id,           a.autor,
       a.historia,           a.perso_nombre1,
       a.perso_nombre2,      a.perso_nombre3, 
       a.perso_paterno,      a.perso_materno, 
       a.perso_titulo,       a.perso_sobrenombre, 
       a.perso_rfc,          a.perso_curp, 
       a.perso_nombre,       a.perso_nacionalidad,
       a.perso_fecha_nacimiento,   a.perso_sexo,  
       est.varia_cadena estado,
       aut.perso_nombre nombre_autor
from vperson a
join variables est 
  on a.estad_id = est.varia_id
left join vperson aut 
       on a.autor =  aut.perso_id  ;

/* datos */
insert  into personas 
              (estad_id,      autor,         perso_nombre1, 
               perso_nombre2, perso_paterno, perso_materno, 
               perso_rfc,     perso_curp) 
     values ('1', NULL, 'Admin', 
             NULL, 'admin', NULL, 
             NULL, NULL);  
  
create table clientes(clien_id integer not null
                                   primary key,
                      autor integer not null
                                      references personas(perso_id) 
                                              on delete cascade
                                              on update cascade,
                      modificacion  timestamp,
                      clien_origen varchar(12), 
                      clien_clave  varchar(24) not null ,
                      clien_razon varchar(48) not null, 
                      clien_rfc varchar(24) not null  unique ,
                      socio_id integer,
                      domic_id integer not null     
                                      references domicilios
                                        on delete cascade
                                        on update cascade, 
                      clien_contacto varchar(64)
                                   not null, 
                      clien_puesto varchar(48)
                                   not null,
                      clien_lada varchar(12) not null,              
                      clien_telefono varchar(24),
                      clien_extension varchar(24),
                      clien_email varchar(24) );  
  
--------------------------------------------------------------------------------
/**************************** TIPOS DE ASENTAMIENTO ***************************/ 
create table tipos_asentamiento(tasen_id integer   not null  
                                             auto_increment
                                             primary key,     
                                tasen_nombre varchar(48)  not null);

commit work;

insert  into tipos_asentamiento (tasen_id, tasen_nombre) values ('01', 'AEROPUERTO');
insert  into tipos_asentamiento (tasen_id, tasen_nombre) values ('02', 'BARRIO');
insert  into tipos_asentamiento (tasen_id, tasen_nombre) values ('04', 'Campamento');
insert  into tipos_asentamiento (tasen_id, tasen_nombre) values ('08', 'Ciudad');
insert  into tipos_asentamiento (tasen_id, tasen_nombre) values ('09', 'Colonia');
insert  into tipos_asentamiento (tasen_id, tasen_nombre) values ('10', 'Condominio');
insert  into tipos_asentamiento (tasen_id, tasen_nombre) values ('11', 'Congregación');
insert  into tipos_asentamiento (tasen_id, tasen_nombre) values ('12', 'Conjunto Habitacional');
insert  into tipos_asentamiento (tasen_id, tasen_nombre) values ('15', 'Ejido');
insert  into tipos_asentamiento (tasen_id, tasen_nombre) values ('16', 'Estación');
insert  into tipos_asentamiento (tasen_id, tasen_nombre) values ('17', 'Equipamiento');
insert  into tipos_asentamiento (tasen_id, tasen_nombre) values ('18', 'Exhacienda');
insert  into tipos_asentamiento (tasen_id, tasen_nombre) values ('20', 'Finca');
insert  into tipos_asentamiento (tasen_id, tasen_nombre) values ('21', 'Fraccionamiento');
insert  into tipos_asentamiento (tasen_id, tasen_nombre) values ('22', 'Gran Usuario');
insert  into tipos_asentamiento (tasen_id, tasen_nombre) values ('23', 'Granja');
insert  into tipos_asentamiento (tasen_id, tasen_nombre) values ('24', 'Hacienda');
insert  into tipos_asentamiento (tasen_id, tasen_nombre) values ('25', 'Ingenio');
insert  into tipos_asentamiento (tasen_id, tasen_nombre) values ('26', 'Parque Industrial');
insert  into tipos_asentamiento (tasen_id, tasen_nombre) values ('27', 'Poblado Comunal');
insert  into tipos_asentamiento (tasen_id, tasen_nombre) values ('28', 'Pueblo');
insert  into tipos_asentamiento (tasen_id, tasen_nombre) values ('29', 'Ranchería');
insert  into tipos_asentamiento (tasen_id, tasen_nombre) values ('30', 'Residencial');
insert  into tipos_asentamiento (tasen_id, tasen_nombre) values ('31', 'Unidad Habitacional');
insert  into tipos_asentamiento (tasen_id, tasen_nombre) values ('32', 'Villa');
insert  into tipos_asentamiento (tasen_id, tasen_nombre) values ('33', 'Zona Comercial');
insert  into tipos_asentamiento (tasen_id, tasen_nombre) values ('34', 'Zona Federal');
insert  into tipos_asentamiento (tasen_id, tasen_nombre) values ('37', 'Zona Industrial');
insert  into tipos_asentamiento (tasen_id, tasen_nombre) values ('38', 'Ampliación');
insert  into tipos_asentamiento (tasen_id, tasen_nombre) values ('39', 'Club De Golf');
insert  into tipos_asentamiento (tasen_id, tasen_nombre) values ('40', 'Puerto');
insert  into tipos_asentamiento (tasen_id, tasen_nombre) values ('45', 'Paraje');
insert  into tipos_asentamiento (tasen_id, tasen_nombre) values ('47', 'Zona Militar');
insert  into tipos_asentamiento (tasen_id, tasen_nombre) values ('48', 'Rancho');


/******************************Estados_Republica******************************/ 
create table estados_republica(esrep_id integer   not null
                                              primary key
                                              auto_increment,
                               esrep_estado varchar(48)
                                               not null);
 
Commit;
/****** Datos ******/

insert  into estados_republica (esrep_estado) values ('Aguascalientes');
insert  into estados_republica (esrep_estado) values ('Baja California');
insert  into estados_republica (esrep_estado) values ('Baja California Sur');
insert  into estados_republica (esrep_estado) values ('Campeche');
insert  into estados_republica (esrep_estado) values ('Chiapas');
insert  into estados_republica (esrep_estado) values ('Chihuahua');
insert  into estados_republica (esrep_estado) values ('Coahuila De Zaragoza');
insert  into estados_republica (esrep_estado) values ('Colima');
insert  into estados_republica (esrep_estado) values ('Distrito Federal');
insert  into estados_republica (esrep_estado) values ('Durango');
insert  into estados_republica (esrep_estado) values ('Guanajuato');
insert  into estados_republica (esrep_estado) values ('Guerrero');
insert  into estados_republica (esrep_estado) values ('Hidalgo');
insert  into estados_republica (esrep_estado) values ('Jalisco');
insert  into estados_republica (esrep_estado) values ('Michoacán De Ocampo');
insert  into estados_republica (esrep_estado) values ('Morelos');
insert  into estados_republica (esrep_estado) values ('México');
insert  into estados_republica (esrep_estado) values ('Nayarit');
insert  into estados_republica (esrep_estado) values ('Nuevo León');
insert  into estados_republica (esrep_estado) values ('Oaxaca');
insert  into estados_republica (esrep_estado) values ('Puebla');
insert  into estados_republica (esrep_estado) values ('Querétaro');
insert  into estados_republica (esrep_estado) values ('Quintana Roo');
insert  into estados_republica (esrep_estado) values ('San Luis Potosí');
insert  into estados_republica (esrep_estado) values ('Sinaloa');
insert  into estados_republica (esrep_estado) values ('Sonora');
insert  into estados_republica (esrep_estado) values ('Tabasco');
insert  into estados_republica (esrep_estado) values ('Tamaulipas');
insert  into estados_republica (esrep_estado) values ('Tlaxcala');
insert  into estados_republica (esrep_estado) values ('Veracruz De Ignacio De La Llave');
insert  into estados_republica (esrep_estado) values ('Yucatán');
insert  into estados_republica (esrep_estado) values ('Zacatecas');

Commit;
/***************************************************************************/
create table importcp(impcp_id  integer not null
                                        primary key
                                        auto_increment,
      d_codigo varchar(5),  
      d_asenta varchar(64),  
      d_mnpio varchar(64),  
      c_estado     integer
                        references estados_republica(esrep_id)
                            on delete cascade
                      on update cascade,
      c_tipo_asenta integer
                        references tipos_asentamiento(tasen_id)
                            on delete cascade
                      on update cascade);
/******* Vista ********/                      
create view vcp as 
select a.impcp_id, a.d_codigo, a.d_asenta, a.d_mnpio, 
       ta.tasen_nombre, er.esrep_estado
 from importcp a   
 join tipos_asentamiento ta 
   on  a.c_tipo_asenta = ta.tasen_id
 join estados_republica er
   on a.c_estado = er.esrep_id;
   
/******************************Domicilios******************************/
create table domicilios(domic_id integer not null
                                     primary key,
                        domic_calle_numero varchar(128) not null, 
                        domic_colonia varchar( 64) not null, 
                        import_id integer not null 
                                        references importcp
                                            on delete cascade
                                            on update cascade);


/***** Vista *****/
  create view vdomicilios as  
      select  d.domic_id,  d.domic_calle_numero, d.domic_colonia, 
             cp.d_codigo, cp.d_mnpio,           cp.tasen_nombre, 
             cp.esrep_estado
        from domicilios d 
        join vcp cp  
          on d.import_id =  cp.impcp_id
          

                        
                        
                        
                        
