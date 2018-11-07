/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  develop0
 * Created: 1/10/2018
 */



SELECT 
    e.EMPLE_NUM_NOMINA, 
    r.USUAR_USUARIO, r.USUAR_NOMBRE, r.USUAR_CLAVE,
    r.USUAR_CORREO_1,  r.USUAR_TEL_1,     r.USUAR_EXT_1, 
     p.PERSO_NOMBRE, 
    p.PERSO_EMAIL,
    p.PERSO_TELEFONO,
    pe.PERSO_NOMBRE jefe,
    pp.PERPU_NOMBRE_COMPLETO,
    pp.ESTOR_NOMBRE_COMPLETO
    
from empleados e 
join usuarios r on e.EMPLE_ID =  r.USUAR_RELACION_ID
join 
 PERSONAS p on p.PERSO_ID = e.PERSO_ID
join empleADOS J ON 
e.EMPLE_JEFE = j.EMPLE_ID
join personas pe on j.perso_id = pe.PERSO_ID
join vPERFILES_PUESTO pp on e.PERPU_ID =  pp.PERPU_ID


where e.ESTAD_Id  = 1
order by e.EMPLE_NUM_NOMINA