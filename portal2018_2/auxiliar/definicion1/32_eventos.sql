d/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  develop0
 * Created: 24/07/2018
 */


/******************************Eventos******************************/
Create Table Eventos(event_Id Tid 
                        Constraint event_Id_NN Not Null
                        Constraint event_key Primary Key,

                    autor tid 
                        Constraint event_autor_Emple_Modif_NN Not Null
                        Constraint event_autor_lnk_Perso
                            References Personas(Perso_ID) 
                                on Delete Cascade
                                on Update Cascade,
                    Modificacion  timestamp, 

                    estad_Id    tid 
                        Constraint Event_Estad_id_NN Not Null 
                        Constraint Event_lnk_Variables
                            References Variables(varia_id)  
                                on Delete Cascade
                                on Update Cascade,
                    event_evento tsNombreXL
                        Constraint event_evento_NN Not Null, 
                    event_fecha date
                        Constraint event_fecha_NN Not Null, 
                    event_inicio time
                        Constraint event_inicio_NN Not Null, 
                    event_fin time
                        Constraint event_fin_NN Not Null, 
                    event_pagado tBoolean default 'no'
                        Constraint event_pagado_NN Not Null, 
                    estor_id tid
                        Constraint event_lnk_estor
                            References Estructura_organica( estor_id)
                                on Delete Cascade
                                on Update Cascade, 
                    emple_id tid
                        Constraint event_lnk_emple_id
                            References Empleados(emple_id)
                                on Delete Cascade
                                on Update Cascade, 
                    salon_id tid
                        Constraint salo_acom_lnk_varia_id
                            References salones(salon_id)
                                on Delete Cascade
                                on Update Cascade, 
                    event_responsable tsNombreL, 
                    event_menu tsNombreXXL, 
                    event_pax int, 
                    event_servicio tid
                        Constraint event_srv_lnk_varia_id
                            References variables(varia_id)
                                on Delete Cascade
                                on Update Cascade, 
                    event_acomodo tid
                        Constraint event_acom_lnk_varia_id
                            References variables(varia_id)
                                on Delete Cascade
                                on Update Cascade, 
                    event_observaciones tsNombreXXL
);
Create Generator event_Id_Gen;
Commit work;

Set term ^; 
Create trigger 
   Alta_event For Eventos
   Active Before Insert
   as 
       Begin
       If (New.event_Id Is null) Then
          New.event_Id = Gen_id(event_Id_Gen,1);

      If (New.modificacion Is null) Then 
        New.modificacion = current_timestamp;
       End ;
^
  Create trigger 
    Modif_Event For Eventos
      Active Before Update
    as 
      Begin
      If (New.modificacion Is null) Then 
        New.modificacion = current_timestamp;
      End ;
  ^

Commit work^
Create Procedure event_Key_Gen 
   Returns( Avalue Integer)
      As
        Begin
        aValue = Gen_id(event_Id_Gen,1);
        End
^

Commit work^

set term ; ^

Grant all on Eventos To Public;
Grant Execute on Procedure event_Key_Gen  To Public;

/***** preparando la vista   ********************/
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
join vEMPLEADOS a on a.autor = r.EMPLE_ID
join VARIABLES es on es.VARIA_ID = r.estad_id 

join vESTRUCTURA_ORGANICA eo on eo.ESTOR_ID = r.ESTOR_ID
join vEMPLEADOS er on er.EMPLE_ID = r.EMPLE_ID
join SALONES s on s.SALON_ID  = r.SALON_ID
join VARIABLES ser on ser.VARIA_ID =  r.EVENT_SERVICIO
join VARIABLES ac on ac.VARIA_ID =  r.EVENT_ACOMODO


/*********** genera tabla  *********************/

create table vEventos (
    EVENT_ID tid not null primary key,  Autor tid , 
    Modificacion timestamp,             Estad_id tid, 
    EVENT_EVENTO tsnombrexl,            EVENT_FECHA date, 
    EVENT_INICIO time,                  EVENT_FIN time,
    EVENT_PAGADO tBoolean,              ESTOR_ID tid, 
    EMPLE_ID tid,                       SALON_ID tid, 
    EVENT_RESPONSABLE TSNOMBREL,        EVENT_MENU TSNOMBREXXL, 
    EVENT_PAX integer,                  EVENT_SERVICIO tid, 
    EVENT_ACOMODO tid,                  EVENT_observaciones TSNOMBREXXL

    nombre_autor TSNOMBRELP,                    estado TSNOMBRELP,
    estor_nombre_completo  TSNOMBRELP,          empleado_responsable TSNOMBRELP,
    SALON_NOMBRE TSNOMBREC,                     servicio TSNOMBRELP, 
    acomodo TSNOMBRELP
)

/* vista */
drop table vEventos;
create view vEventos as 
SELECT  r.EVENT_ID,                     r.autor, 
        r.Modificacion,                 r.estad_id, 
        r.EVENT_EVENTO,                 r.EVENT_FECHA, 
        r.EVENT_INICIO,                 r.EVENT_FIN,
        r.EVENT_PAGADO,                 r.ESTOR_ID, 
            r.EMPLE_ID,                 r.SALON_ID, 
        r.EVENT_RESPONSABLE,            r.EVENT_MENU, 
        r.EVENT_PAX,                    r.EVENT_SERVICIO, 
            r.EVENT_ACOMODO,            r.EVENT_observaciones, 

        a.PERSO_NOMBRE nombre_autor,        es.VARIA_CADENA estado,
        eo.estor_nombre_completo,           er.PERSO_NOMBRE empleado_responsable, 
        s.SALON_NOMBRE,                     ser.VARIA_CADENA servicio, 
        ac.VARIA_CADENA acomodo
    
FROM EVENTOS r
join vEMPLEADOS a on a.autor = r.EMPLE_ID
join VARIABLES es on es.VARIA_ID = r.estad_id 

join vESTRUCTURA_ORGANICA eo on eo.ESTOR_ID = r.ESTOR_ID
join vEMPLEADOS er on er.EMPLE_ID = r.EMPLE_ID
join SALONES s on s.SALON_ID  = r.SALON_ID
join VARIABLES ser on ser.VARIA_ID =  r.EVENT_SERVICIO
join VARIABLES ac on ac.VARIA_ID =  r.EVENT_ACOMODO
