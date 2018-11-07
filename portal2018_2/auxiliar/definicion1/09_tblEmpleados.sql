    /****************************** Tabla: EMPLEADOS ******************************/
    Create Table Empleados(                      
                            Emple_Id Tid
                                    Constraint Emple_Id_NN Not Null
                                    Constraint Emple_key Primary Key,
                            autor tid 
                                    Constraint autor_Emple_NN Not Null
                                    Constraint Emple_lnk_Perso
                                            References Personas(Perso_ID) 
                                                    on Delete Cascade
                                                    on Update Cascade,
                            Historia BLOB SUB_TYPE TEXT,
                            Modificacion  timestamp, 
                            estad_Id    tid 
                                    Constraint Emple_Estad_id_NN Not Null 
                                    Constraint Emple_lnk_Valores
                                            References Variables(Varia_id) 
                                                    on Delete Cascade
                                                    on Update Cascade,
                            Perso_id tid 
                                    Constraint Emple_Perso_id_unk unique
                                    Constraint Emple_Perso_id_NN Not Null
                                    Constraint Emple_Perso_id_lnk_Personas
                                             References Personas
                                                    on Delete Cascade
                                                    on Update Cascade,
                            Emple_Num_nomina integer 
                                    Constraint Emple_Num_nomina_NN Not Null
                                    Constraint Emple_Num_nomina_unk unique,
                            perpu_id tid  
                                    Constraint Emple_perpu_id_NN Not Null
                                    Constraint Emple_lnk_PerPu
                                            References Perfiles_puesto 
                                                    on Delete Cascade
                                                    on Update Cascade,
                            Emple_Horario tsNombreL 
                                    Constraint Emple_Horario_NN Not Null,
                            Emple_Jornada_Laboral  tsnombreL ,
                            Emple_Descanso_semanal  tsNombreL,
                            Emple_Lugar_trabajo tsNombreL ,
                            Emple_Terminacion_contrato  date ,
                            Emple_Jefe Tid  
                                Constraint Emple_Lnk_Jefe References Empleados (Emple_Id) 
                                   On Update Cascade 
                                   On Delete Cascade,
                            Emple_usuario tsNombre  unique
                                    Constraint Emple_usuario_NN Not Null,
                            Emple_Clave_Sistemas  tsNombre 
                                    Constraint Emple_Clave_Sistemas_NN Not Null,
                            emple_correo1 TSNOMBREL,
                            emple_correo2 TSNOMBREL,
                            emple_tel_1 TSNOMBRE,
                            emple_tel_1 TSNOMBRE,
                            piso_id Tid  
                                Constraint Emple_Lnk_piso References pisos (piso_Id) 
                                   On Update Cascade 
                                   On Delete Cascade,
                                    );
  
  /*.............................. GENERADORE(S) ..............................*/
  Create Generator Emple_Id_Gen;
  /*.............................. TRIGGER(S) ..............................*/
  Set term ^; 
  Create trigger 
    Alta_Emple For Empleados
      Active Before Insert
    as 
      Begin
      If (New.Emple_Id Is null) Then
        New.Emple_Id = Gen_id(Emple_Id_Gen,1);
      If (New.modificacion Is null) Then 
        New.modificacion = current_timestamp;
      if (New.Emple_usuario is null ) then 
        New.Emple_usuario = new.Emple_Num_nomina;
      if (New.Emple_Clave_Sistemas is null ) then 
        New.Emple_Clave_Sistemas = new.Emple_Num_nomina;      
      End ;
  ^
  
  Create trigger 
    Modif_Emple For Empleados
      Active Before Update
    as 

declare temporal TSNOMBRE3x;
declare crlf char(2);
declare separador  char(2);  
declare Aut_Anterior varchar(48);  
declare nombre TSNOMBRE1X;    
      Begin
      If (New.modificacion Is null) Then 
        New.modificacion = current_timestamp;
      if (New.Emple_usuario is null ) then  
        New.Emple_usuario = new.Emple_Num_nomina;
      if (New.Emple_Clave_Sistemas is null ) then  
        New.Emple_Clave_Sistemas = new.Emple_Num_nomina;
        
       Select Temporal, Separador
         From TraeCambio('ESTAD_ID'      , Old.ESTAD_ID                       , 
                           New.ESTAD_ID , :Temporal, :Separador )
         into :Temporal, :Separador; 
       Select Temporal, Separador
         From TraeCambio('PERSO_ID'                       , Old.PERSO_ID                       , 
                         New.PERSO_ID                       , :Temporal, :Separador )
         into :Temporal, :Separador; 
       Select Temporal, Separador
         From TraeCambio('EMPLE_NUM_NOMINA'               , Old.EMPLE_NUM_NOMINA               , 
                         New.EMPLE_NUM_NOMINA               , :Temporal, :Separador )
         into :Temporal, :Separador; 
       Select Temporal, Separador
         From TraeCambio('PERPU_ID'                       , Old.PERPU_ID                       , 
                         New.PERPU_ID                       , :Temporal, :Separador )
         into :Temporal, :Separador; 
       Select Temporal, Separador
         From TraeCambio('EMPLE_HORARIO'                  , Old.EMPLE_HORARIO                  , 
                         New.EMPLE_HORARIO                  , :Temporal, :Separador )
         into :Temporal, :Separador; 
       Select Temporal, Separador
         From TraeCambio('EMPLE_JORNADA_LABORAL'          , Old.EMPLE_JORNADA_LABORAL           , 
                         New.EMPLE_JORNADA_LABORAL           , :Temporal, :Separador )
         into :Temporal, :Separador; 
       Select Temporal, Separador
         From TraeCambio('EMPLE_DESCANSO_SEMANAL'         , Old.EMPLE_DESCANSO_SEMANAL         , 
                         New.EMPLE_DESCANSO_SEMANAL         , :Temporal, :Separador )
         into :Temporal, :Separador; 
       Select Temporal, Separador
         From TraeCambio('EMPLE_LUGAR_TRABAJO'            , Old.EMPLE_LUGAR_TRABAJO            , 
                         New.EMPLE_LUGAR_TRABAJO            , :Temporal, :Separador )
         into :Temporal, :Separador; 
       Select Temporal, Separador
         From TraeCambio('EMPLE_TERMINACION_CONTRATO'     , Old.EMPLE_TERMINACION_CONTRATO     , 
                         New.EMPLE_TERMINACION_CONTRATO     , :Temporal, :Separador )
         into :Temporal, :Separador; 
       Select Temporal, Separador
         From TraeCambio('EMPLE_USUARIO'                  , Old.EMPLE_USUARIO                  , 
                         New.EMPLE_USUARIO                  , :Temporal, :Separador )
         into :Temporal, :Separador; 
       Select Temporal, Separador
         From TraeCambio('EMPLE_CLAVE_SISTEMAS'           , Old.EMPLE_CLAVE_SISTEMAS           , 
                         New.EMPLE_CLAVE_SISTEMAS           , :Temporal, :Separador )
         into :Temporal, :Separador;
          
   If (( :temporal is not null )  and (:Temporal <> '')) Then 
      Begin 
      Select Historia 
        From GeneraCambios (Old.Modificacion, Old.Autor,  
                            :Temporal,        Old.Historia ) 
        Into New.Historia;
      End       
          
      End ;
  ^
  
  Commit work^
  /*.............................. PROCEDURE(S) ..............................*/
  Create Procedure Emple_Key_Gen
     Returns( Avalue Integer)
        As
           Begin
           aValue = Gen_id(Emple_Id_Gen,1);
           End
  ^
  Commit work^
  set term ; ^
  
  /*.............................. PERMISOS ..............................*/
  Grant all on Empleados To Public;
  Grant Execute on Procedure Emple_Key_Gen  To Public;


/*****************************************************************************
*****************************************************************************/
/****************************************************************************/
SET AUTODDL ON;

DROP VIEW VEVENTOS;
DROP VIEW VEMPLEADOS;

/**************** DROPPING COMPLETE ***************/

CREATE VIEW VEMPLEADOS (EMPLE_ID, AUTOR, HISTORIA, MODIFICACION, ESTAD_ID, PERSO_ID, EMPLE_NUM_NOMINA, PERPU_ID, EMPLE_HORARIO, EMPLE_JORNADA_LABORAL, EMPLE_DESCANSO_SEMANAL, EMPLE_LUGAR_TRABAJO, EMPLE_TERMINACION_CONTRATO, EMPLE_USUARIO, EMPLE_CLAVE_SISTEMAS, EMPLE_INGRESO, EMPLE_CANTIDAD_DIAS, EMPLE_ANTIGUEDAD, EMPLE_NSS, PEMODIFICACION, PEESTADOID, PEAUTOR, PEHISTORIA, PERSO_NOMBRE1, PERSO_NOMBRE2, PERSO_NOMBRE3, PERSO_PATERNO, PERSO_MATERNO, PERSO_TITULO, PERSO_SOBRENOMBRE, PERSO_RFC, PERSO_CURP, PERSO_NOMBRE, PERSO_NACIONALIDAD, PERSO_FECHA_NACIMIENTO, PERSO_SEXO, PEESTADO, PENOMBRE_AUTOR, INICIALES, PERPU_NOMBRE_COMPLETO, ESTOR_ID, ESTOR_NOMBRE_COMPLETO, ESTOR_SUPERIOR, ESTOR_SUP_NOMBRE_COMPLETO, JFENOMBRE, JFEEMPL_ID, ESTADO, NOMBRE_AUTOR)
AS     
select em.Emple_Id,                em.Autor,            em.Historia,                
       em.Modificacion,            em.Estad_Id,         em.Perso_Id, 
       em.Emple_Num_Nomina,        em.Perpu_Id,         em.Emple_Horario,           
       em.Emple_Jornada_Laboral,   em.Emple_Descanso_Semanal,  
       em.Emple_Lugar_Trabajo,     em.Emple_Terminacion_Contrato, 
       em.Emple_Usuario,           em.Emple_Clave_Sistemas,
       em.emple_ingreso,           em.Emple_cantidad_dias,
       em.emple_antiguedad,        em.emple_nss,
    
       Pe.Modificacion peModificacion,     Pe.Estad_Id peEstadoId, 
       Pe.Autor  peAutor,          Pe.Historia peHistoria,             
       Pe.Perso_Nombre1,           Pe.Perso_Nombre2,     Pe.Perso_Nombre3,    
       Pe.Perso_Paterno,           Pe.Perso_Materno,     Pe.Perso_Titulo, 
       Pe.Perso_Sobrenombre,       Pe.Perso_Rfc,         Pe.Perso_Curp,       
       Pe.Perso_Nombre,            Pe.Perso_Nacionalidad,Pe.Perso_Fecha_Nacimiento, 
       Pe.Perso_Sexo,              Pe.Estado peEstado,   Pe.Nombre_Autor peNombre_Autor,
       SUBSTRING( pe.PERSO_nombre1 FROM 1 FOR 1 )  || 
        SUBSTRING( pe.PERSO_PATERNO FROM 1 FOR 1 ) || 
        coalesce(  SUBSTRING( pe.PERSO_MAterno FROM 1 FOR 1 ), '') Iniciales,        
      
       pem.perpu_nombre_completo,    pem.Estor_id, 
       pem.ESTOR_NOMBRE_COMPLETO,  coalesce(pem.EstOr_Superior,'') EstOr_Superior,   
       coalesce( pem.ESTOR_SUP_NOMBRE_COMPLETO,'') ESTOR_SUP_NOMBRE_COMPLETO,

       coalesce( pjfe.PERSO_NOMBRE, '' ) jfeNombre, 
       jfe.EMPLE_ID jfeempl_id,
       Est.Varia_Cadena Estado,
       Aut.Perso_Nombre Nombre_Autor
         
From Empleados em
Join vPersonas pe 
  on em.perso_id = Pe.Perso_id
Join vPerfiles_puesto pem on
     em.Perpu_id = Pem.perpu_id    
left Join Empleados jfe 
  on pem.REPORTA_A = jfe.perpu_id 
left Join Personas pJfe 
  on pJfe.perso_id =  jfe.PERSO_ID 
  
left join Empleados jfeCargo
       On em.emple_jefe = jfeCargo.emple_id 
left Join Personas pjfeCargo
       on jfeCargo.perso_id =pjfeCargo.Perso_Id

Join Variables Est 
  On em.Estad_Id = Est.Varia_Id
Left Join Personas Aut 
       On em.Autor =  Aut.Perso_Id;

CREATE VIEW VEVENTOS (EVENT_ID, AUTOR, MODIFICACION, ESTAD_ID, EVENT_EVENTO, EVENT_FECHA, EVENT_INICIO, EVENT_FIN, EVENT_PAGADO, ESTOR_ID, EMPLE_ID, SALON_ID, EVENT_RESPONSABLE, EVENT_MENU, EVENT_PAX, EVENT_SERVICIO, EVENT_ACOMODO, EVENT_OBSERVACIONES, NOMBRE_AUTOR, ESTADO, ESTOR_NOMBRE_COMPLETO, EMPLEADO_RESPONSABLE, SALON_NOMBRE, SERVICIO, ACOMODO)
AS    
SELECT  r.EVENT_ID,                     r.autor, 
        r.Modificacion,                 r.estad_id, 
        r.EVENT_EVENTO,                 r.EVENT_FECHA, 
        r.EVENT_INICIO,                 r.EVENT_FIN,
        r.EVENT_PAGADO,                 r.ESTOR_ID, 
            r.EMPLE_ID,                 r.SALON_ID, 
        r.EVENT_RESPONSABLE,            r.EVENT_MENU, 
        r.EVENT_PAX,                    r.EVENT_SERVICIO, 
            r.EVENT_ACOMODO,            r.EVENT_observaciones, 

        a.PERSO_NOMBRE nombre_autor,
        es.VARIA_CADENA estado,
        eo.estor_nombre_completo,       
        er.PERSO_NOMBRE empleado_responsable, 

        s.SALON_NOMBRE, 
        ser.VARIA_CADENA servicio, 
        ac.VARIA_CADENA acomodo
    
FROM EVENTOS r
left join vEMPLEADOS a on a.autor = r.EMPLE_ID
left join VARIABLES es on es.VARIA_ID = r.estad_id 

left join vESTRUCTURA_ORGANICA eo on eo.ESTOR_ID = r.ESTOR_ID
left join vEMPLEADOS er on er.EMPLE_ID = r.EMPLE_ID
left join SALONES s on s.SALON_ID  = r.SALON_ID
left join VARIABLES ser on ser.VARIA_ID =  r.EVENT_SERVICIO
left join VARIABLES ac on ac.VARIA_ID =  r.EVENT_ACOMODO
;

GRANT DELETE, INSERT, REFERENCES, SELECT, UPDATE
 ON VEVENTOS TO  SYSDBA WITH GRANT OPTION;
GRANT DELETE, INSERT, REFERENCES, SELECT, UPDATE
 ON VEMPLEADOS TO  SYSDBA WITH GRANT OPTION;
/****************************************************************************/
/****************************************************************************/
/****************************************************************************/















/*original 
CREATE or alter VIEW VEMPLEADOS (EMPLE_ID, AUTOR, HISTORIA, MODIFICACION, ESTAD_ID, PERSO_ID, EMPLE_NUM_NOMINA, PERPU_ID, EMPLE_HORARIO, EMPLE_JORNADA_LABORAL, EMPLE_DESCANSO_SEMANAL, EMPLE_LUGAR_TRABAJO, EMPLE_TERMINACION_CONTRATO, EMPLE_USUARIO, EMPLE_CLAVE_SISTEMAS, PEMODIFICACION, PEESTADOID, PEAUTOR, PEHISTORIA, PERSO_NOMBRE1, PERSO_NOMBRE2, PERSO_NOMBRE3, PERSO_PATERNO, PERSO_MATERNO, PERSO_TITULO, PERSO_SOBRENOMBRE, PERSO_RFC, PERSO_CURP, PERSO_NOMBRE, PERSO_NACIONALIDAD, PERSO_FECHA_NACIMIENTO, PERSO_SEXO, PEESTADO, PENOMBRE_AUTOR, INICIALES, PERPU_NOMBRE_COMPLETO, ESTOR_ID, ESTOR_NOMBRE_COMPLETO, ESTOR_SUPERIOR, ESTOR_SUP_NOMBRE_COMPLETO, JFENOMBRE, JFEEMPL_ID, ESTADO, NOMBRE_AUTOR)
AS  
select em.Emple_Id,                em.Autor,            em.Historia,                
       em.Modificacion,            em.Estad_Id,         em.Perso_Id, 
       em.Emple_Num_Nomina,        em.Perpu_Id,         em.Emple_Horario,           
       em.Emple_Jornada_Laboral,   em.Emple_Descanso_Semanal,  
       em.Emple_Lugar_Trabajo,     em.Emple_Terminacion_Contrato, 
       em.Emple_Usuario,           em.Emple_Clave_Sistemas,
    
       Pe.Modificacion peModificacion,     Pe.Estad_Id peEstadoId, 
       Pe.Autor  peAutor,          Pe.Historia peHistoria,             
       Pe.Perso_Nombre1,           Pe.Perso_Nombre2,     Pe.Perso_Nombre3,    
       Pe.Perso_Paterno,           Pe.Perso_Materno,     Pe.Perso_Titulo, 
       Pe.Perso_Sobrenombre,       Pe.Perso_Rfc,         Pe.Perso_Curp,       
       Pe.Perso_Nombre,            Pe.Perso_Nacionalidad,Pe.Perso_Fecha_Nacimiento, 
       Pe.Perso_Sexo,              Pe.Estado peEstado,   Pe.Nombre_Autor peNombre_Autor,
       SUBSTRING( pe.PERSO_nombre1 FROM 1 FOR 1 )  || 
        SUBSTRING( pe.PERSO_PATERNO FROM 1 FOR 1 ) || 
        coalesce(  SUBSTRING( pe.PERSO_MAterno FROM 1 FOR 1 ), '') Iniciales,        
      
       pem.perpu_nombre_completo,    pem.Estor_id, 
       pem.ESTOR_NOMBRE_COMPLETO,  coalesce(pem.EstOr_Superior,'') EstOr_Superior,   
       coalesce( pem.ESTOR_SUP_NOMBRE_COMPLETO,'') ESTOR_SUP_NOMBRE_COMPLETO,

       coalesce( pjfe.PERSO_NOMBRE, '' ) jfeNombre, 
       jfe.EMPLE_ID jfeempl_id,
       Est.Varia_Cadena Estado,
       Aut.Perso_Nombre Nombre_Autor
         
From Empleados em
Join vPersonas pe 
  on em.perso_id = Pe.Perso_id
Join vPerfiles_puesto pem on
     em.Perpu_id = Pem.perpu_id    
left Join Empleados jfe 
  on pem.REPORTA_A = jfe.perpu_id 
left Join Personas pJfe 
  on pJfe.perso_id =  jfe.PERSO_ID 
  
left join Empleados jfeCargo
       On em.emple_jefe = jfeCargo.emple_id 
left Join Personas pjfeCargo
       on jfeCargo.perso_id =pjfeCargo.Perso_Id

Join Variables Est 
  On em.Estad_Id = Est.Varia_Id
Left Join Personas Aut 
       On em.Autor =  Aut.Perso_Id;

GRANT DELETE, INSERT, REFERENCES, SELECT, UPDATE
 ON VEMPLEADOS TO  SYSDBA WITH GRANT OPTION;


  
  /*  Datos */
INSERT INTO EMPLEADOS 
               (AUTOR, ESTAD_ID, PERSO_ID, 
                EMPLE_NUM_NOMINA, PERPU_ID, EMPLE_HORARIO, 
                EMPLE_USUARIO, EMPLE_CLAVE_SISTEMAS) 
    VALUES ('1', '1', '1', 
            '0', '1', 'abierto', 
            '000', '000');

commit;

*/


















/* tabla p/Vista modificado se agregan camps y se agrega join a usuario */
CREATE or alter VIEW VEMPLEADOS (
EMPLE_ID, AUTOR, 
HISTORIA,  MODIFICACION, 
ESTAD_ID, PERSO_ID, 
EMPLE_NUM_NOMINA, PERPU_ID, 
EMPLE_HORARIO,  EMPLE_JORNADA_LABORAL, 
EMPLE_DESCANSO_SEMANAL,  EMPLE_LUGAR_TRABAJO, 
EMPLE_TERMINACION_CONTRATO,  EMPLE_USUARIO, 
EMPLE_CLAVE_SISTEMAS,  PEMODIFICACION, 
PEESTADOID,  PEAUTOR, 
PEHISTORIA,  PERSO_NOMBRE1, 
PERSO_NOMBRE2, PERSO_NOMBRE3, 
PERSO_PATERNO, PERSO_MATERNO, 
PERSO_TITULO, PERSO_SOBRENOMBRE, 
PERSO_RFC, PERSO_CURP, 
PERSO_NOMBRE, PERSO_NACIONALIDAD, 
PERSO_FECHA_NACIMIENTO, PERSO_SEXO, 
PEESTADO, PENOMBRE_AUTOR, 
INICIALES, PERPU_NOMBRE_COMPLETO, 
ESTOR_ID, ESTOR_NOMBRE_COMPLETO, 
ESTOR_SUPERIOR, ESTOR_SUP_NOMBRE_COMPLETO, 
JFENOMBRE, JFEEMPL_ID, 
ESTADO, NOMBRE_AUTOR)





AS  
select em.Emple_Id,                em.Autor,            em.Historia,                
       em.Modificacion,            em.Estad_Id,         em.Perso_Id, 
       em.Emple_Num_Nomina,        em.Perpu_Id,         em.Emple_Horario,           
       em.Emple_Jornada_Laboral,   em.Emple_Descanso_Semanal,  
       em.Emple_Lugar_Trabajo,     em.Emple_Terminacion_Contrato, 
       em.Emple_Usuario,           em.Emple_Clave_Sistemas,
    
       Pe.Modificacion peModificacion,     Pe.Estad_Id peEstadoId, 
       Pe.Autor  peAutor,          Pe.Historia peHistoria,             
       Pe.Perso_Nombre1,           Pe.Perso_Nombre2,     Pe.Perso_Nombre3,    
       Pe.Perso_Paterno,           Pe.Perso_Materno,     Pe.Perso_Titulo, 
       Pe.Perso_Sobrenombre,       Pe.Perso_Rfc,         Pe.Perso_Curp,       
       Pe.Perso_Nombre,            Pe.Perso_Nacionalidad,Pe.Perso_Fecha_Nacimiento, 
       Pe.Perso_Sexo,              Pe.Estado peEstado,   Pe.Nombre_Autor peNombre_Autor,
       SUBSTRING( pe.PERSO_nombre1 FROM 1 FOR 1 )  || 
        SUBSTRING( pe.PERSO_PATERNO FROM 1 FOR 1 ) || 
        coalesce(  SUBSTRING( pe.PERSO_MAterno FROM 1 FOR 1 ), '') Iniciales,        
      
       pem.perpu_nombre_completo,    pem.Estor_id, 
       pem.ESTOR_NOMBRE_COMPLETO,  coalesce(pem.EstOr_Superior,'') EstOr_Superior,   
       coalesce( pem.ESTOR_SUP_NOMBRE_COMPLETO,'') ESTOR_SUP_NOMBRE_COMPLETO,

       coalesce( pjfe.PERSO_NOMBRE, '' ) jfeNombre, 
       jfe.EMPLE_ID jfeempl_id,
       Est.Varia_Cadena Estado,
       Aut.Perso_Nombre Nombre_Autor
         
From Empleados em
Join vPersonas pe 
  on em.perso_id = Pe.Perso_id
Join vPerfiles_puesto pem on
     em.Perpu_id = Pem.perpu_id    
left Join Empleados jfe 
  on pem.REPORTA_A = jfe.perpu_id 
left Join Personas pJfe 
  on pJfe.perso_id =  jfe.PERSO_ID 
  
left join Empleados jfeCargo
       On em.emple_jefe = jfeCargo.emple_id 
left Join Personas pjfeCargo
       on jfeCargo.perso_id =pjfeCargo.Perso_Id

Join Variables Est 
  On em.Estad_Id = Est.Varia_Id
Left Join Personas Aut 
       On em.Autor =  Aut.Perso_Id;

GRANT DELETE, INSERT, REFERENCES, SELECT, UPDATE
 ON VEMPLEADOS TO  SYSDBA WITH GRANT OPTION;


  
  /*  Datos */
INSERT INTO EMPLEADOS 
               (AUTOR, ESTAD_ID, PERSO_ID, 
                EMPLE_NUM_NOMINA, PERPU_ID, EMPLE_HORARIO, 
                EMPLE_USUARIO, EMPLE_CLAVE_SISTEMAS) 
    VALUES ('1', '1', '1', 
            '0', '1', 'abierto', 
            '000', '000');

commit;
  /*
  1087
  1087
  906
  inicio
  execute
  apagar
  
  */
  
create table vempleados(
emple_id tid not null primary key,
autor tid,
historia blob,
Modificacion timestamp,
estad_id tid,
perso_id tid,
Emple_Num_Nomina integer,
perpu_id tid,
emple_horario tsnombrel,
emple_jornada_laboral tsnombrel,
Emple_Terminacion_Contrato tsnombrel,
Emple_Usuario tsnombre,
Emple_Clave_Sistemas tsnombre,
emple_ingreso date,





select em.Emple_Id,                em.Autor,            em.Historia,                
       em.Modificacion,            em.Estad_Id,         em.Perso_Id, 
       em.Emple_Num_Nomina,        em.Perpu_Id,         em.Emple_Horario,           
       em.Emple_Jornada_Laboral,   em.Emple_Descanso_Semanal,  
       em.Emple_Terminacion_Contrato, emple_jefe,
       em.Emple_Usuario,           em.Emple_Clave_Sistemas,
    
       Pe.Modificacion peModificacion,     Pe.Estad_Id peEstadoId, 
       Pe.Autor  peAutor,          Pe.Historia peHistoria,             
       Pe.Perso_Nombre1,           Pe.Perso_Nombre2,     Pe.Perso_Nombre3,    
       Pe.Perso_Paterno,           Pe.Perso_Materno,     Pe.Perso_Titulo, 
       Pe.Perso_Sobrenombre,       Pe.Perso_Rfc,         Pe.Perso_Curp,       
       Pe.Perso_Nombre,            Pe.Perso_Nacionalidad,Pe.Perso_Fecha_Nacimiento, 
       Pe.Perso_Sexo,              Pe.Estado peEstado,   Pe.Nombre_Autor peNombre_Autor,
       em.EMPLE_TEL_1,             em.EMPLE_TEL_2,       em.EMPLE_CORREO_1,
       em.EMPLE_CORREO_2, 
    
       SUBSTRING( pe.PERSO_nombre1 FROM 1 FOR 1 )  || 
        SUBSTRING( pe.PERSO_PATERNO FROM 1 FOR 1 ) || 
        coalesce(  SUBSTRING( pe.PERSO_MAterno FROM 1 FOR 1 ), '') Iniciales,        
      
       pem.perpu_nombre_completo,    pem.Estor_id, 
       pem.ESTOR_NOMBRE_COMPLETO,  coalesce(pem.EstOr_Superior,'') EstOr_Superior,   
       coalesce( pem.ESTOR_SUP_NOMBRE_COMPLETO,'') ESTOR_SUP_NOMBRE_COMPLETO,

       coalesce( pjfe.PERSO_NOMBRE, '' ) jfeNombre, 
       jfe.EMPLE_ID jfeempl_id,
       Est.Varia_Cadena Estado,
       Aut.Perso_Nombre Nombre_Autor
       
         
From Empleados em
Join vPersonas pe 
  on em.perso_id = Pe.Perso_id
Join vPerfiles_puesto pem on
     em.Perpu_id = Pem.perpu_id    
left Join Empleados jfe 
  on pem.REPORTA_A = jfe.perpu_id 
left Join Personas pJfe 
  on pJfe.perso_id =  jfe.PERSO_ID 
 
 

Join Variables Est 
  On em.Estad_Id = Est.Varia_Id
Left Join Personas Aut 
       On em.Autor =  Aut.Perso_Id;







----------------------
SET AUTODDL ON;

DROP VIEW VEVENTOS;
DROP VIEW VEMPLEADOS;

/**************** DROPPING COMPLETE ***************/

CREATE VIEW VEMPLEADOS 
AS     
select em.Emple_Id,                em.Autor,            em.Historia,                
       em.Modificacion,            em.Estad_Id,         em.Perso_Id, 
       em.Emple_Num_Nomina,        em.Perpu_Id,         em.Emple_Horario,           
       em.Emple_Jornada_Laboral,   em.Emple_Descanso_Semanal,  
       em.Emple_Terminacion_Contrato, 
       em.Emple_Usuario,           em.Emple_Clave_Sistemas,
       em.emple_ingreso,           em.Emple_cantidad_dias,
       em.emple_antiguedad,        em.emple_nss,
       em.emple_tel_1,              em.emple_tel_2,
       em.emple_correo_1,          em.emple_correo_2,
       em.piso_id,
       
       piso.PISO_NOMBRE, ed.EDIFI_NOMBRE,
    
       Pe.Modificacion peModificacion,     Pe.Estad_Id peEstadoId, 
       Pe.Autor  peAutor,          Pe.Historia peHistoria,             
       Pe.Perso_Nombre1,           Pe.Perso_Nombre2,     Pe.Perso_Nombre3,    
       Pe.Perso_Paterno,           Pe.Perso_Materno,     Pe.Perso_Titulo, 
       Pe.Perso_Sobrenombre,       Pe.Perso_Rfc,         Pe.Perso_Curp,       
       Pe.Perso_Nombre,            Pe.Perso_Nacionalidad,Pe.Perso_Fecha_Nacimiento, 
       Pe.Perso_Sexo,              Pe.Estado peEstado,   Pe.Nombre_Autor peNombre_Autor,
       SUBSTRING( pe.PERSO_nombre1 FROM 1 FOR 1 )  || 
        SUBSTRING( pe.PERSO_PATERNO FROM 1 FOR 1 ) || 
        coalesce(  SUBSTRING( pe.PERSO_MAterno FROM 1 FOR 1 ), '') Iniciales,        
      
      
       pem.perpu_nombre_completo,    pem.Estor_id, 
       pem.ESTOR_NOMBRE_COMPLETO,  coalesce(pem.EstOr_Superior,'') EstOr_Superior,   
       coalesce( pem.ESTOR_SUP_NOMBRE_COMPLETO,'') ESTOR_SUP_NOMBRE_COMPLETO,

       coalesce( pjfe.PERSO_NOMBRE, '' ) jfeNombre, 
       jfe.EMPLE_ID jfeempl_id,
       Est.Varia_Cadena Estado,
       Aut.Perso_Nombre Nombre_Autor
         
From Empleados em
Join vPersonas pe 
  on em.perso_id = Pe.Perso_id
Join vPerfiles_puesto pem on
     em.Perpu_id = Pem.perpu_id    
left Join Empleados jfe 
  on pem.REPORTA_A = jfe.perpu_id 
left Join Personas pJfe 
  on pJfe.perso_id =  jfe.PERSO_ID 
  
left join pisos  piso
       On em.piso_id = piso.PISO_ID
       
left join edificios ed 
   on piso.EDIFI_ID =  ed.EDIFI_ID

Join Variables Est 
  On em.Estad_Id = Est.Varia_Id
Left Join Personas Aut 
       On em.Autor =  Aut.Perso_Id;

CREATE VIEW VEVENTOS (EVENT_ID, AUTOR, MODIFICACION, ESTAD_ID, EVENT_EVENTO, EVENT_FECHA, EVENT_INICIO, EVENT_FIN, EVENT_PAGADO, ESTOR_ID, EMPLE_ID, SALON_ID, EVENT_RESPONSABLE, EVENT_MENU, EVENT_PAX, EVENT_SERVICIO, EVENT_ACOMODO, EVENT_OBSERVACIONES, NOMBRE_AUTOR, ESTADO, ESTOR_NOMBRE_COMPLETO, EMPLEADO_RESPONSABLE, SALON_NOMBRE, SERVICIO, ACOMODO)
AS    
SELECT  r.EVENT_ID,                     r.autor, 
        r.Modificacion,                 r.estad_id, 
        r.EVENT_EVENTO,                 r.EVENT_FECHA, 
        r.EVENT_INICIO,                 r.EVENT_FIN,
        r.EVENT_PAGADO,                 r.ESTOR_ID, 
            r.EMPLE_ID,                 r.SALON_ID, 
        r.EVENT_RESPONSABLE,            r.EVENT_MENU, 
        r.EVENT_PAX,                    r.EVENT_SERVICIO, 
            r.EVENT_ACOMODO,            r.EVENT_observaciones, 

        a.PERSO_NOMBRE nombre_autor,
        es.VARIA_CADENA estado,
        eo.estor_nombre_completo,       
        er.PERSO_NOMBRE empleado_responsable, 

        s.SALON_NOMBRE, 
        ser.VARIA_CADENA servicio, 
        ac.VARIA_CADENA acomodo
    
FROM EVENTOS r
left join vEMPLEADOS a on a.autor = r.EMPLE_ID
left join VARIABLES es on es.VARIA_ID = r.estad_id 

left join vESTRUCTURA_ORGANICA eo on eo.ESTOR_ID = r.ESTOR_ID
left join vEMPLEADOS er on er.EMPLE_ID = r.EMPLE_ID
left join SALONES s on s.SALON_ID  = r.SALON_ID
left join VARIABLES ser on ser.VARIA_ID =  r.EVENT_SERVICIO
left join VARIABLES ac on ac.VARIA_ID =  r.EVENT_ACOMODO
;

GRANT DELETE, INSERT, REFERENCES, SELECT, UPDATE
 ON VEVENTOS TO  SYSDBA WITH GRANT OPTION;
GRANT DELETE, INSERT, REFERENCES, SELECT, UPDATE
 ON VEMPLEADOS TO  SYSDBA WITH GRANT OPTION;
