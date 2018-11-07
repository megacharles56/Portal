/****************************** Tabla: PERMISO_LABORAL ******************************/
Create Table permiso_laboral(
                        perla_Id Tid
                                Constraint perla_Id_NN Not Null
                                Constraint perla_key Primary Key,
                        autor tid
                                Constraint autor_perla_NN Not Null
                                Constraint perla_lnk_Perso
                                        References Personas(Perso_ID)
                                                on Delete Cascade
                                                on Update Cascade,
                        emple_id tid
                                Constraint emple_id_perla_NN Not Null
                                Constraint perla_lnk_emple
                                        References empleados(emple_ID)
                                                on Delete Cascade
                                                on Update Cascade,

                        Modificacion  timestamp,
                        Estad_Id      tid
                                Constraint Perla_Estad_id_NN Not Null
                                Constraint Perla_lnk_Estad
                                        References Variables (varia_id)
                                                on Delete Cascade
                                                on Update Cascade,
                        perla_dia_inicial Date
                                Constraint perla_dia_inicial_NN Not Null,
                        perla_hora_inicial Time ,
                        perla_hora_final Time ,
                        perla_dia_final Date ,
                        perla_asunto tId
                                Constraint perla_asunto_NN Not Null
                                Constraint perla_asunto_lnk_variables
                                         References variables(varia_id)
                                                on Delete Cascade
                                                on Update Cascade,
                        perla_observaciones tsNombreXXL,

                       );

/*.............................. GENERADORE(S) ..............................*/
Create Generator perla_Id_Gen;
Commit work;

/*.............................. TRIGGER(S) ..............................*/
Set term ^;
Create trigger
  Alta_perla For permiso_laboral
    Active Before Insert
  as
    Begin
    If (New.perla_Id Is null) Then
      New.perla_Id = Gen_id(perla_Id_Gen,1);
    If (New.modificacion Is null) Then
      New.modificacion = current_timestamp;
    End ;
^

Create trigger
  Modif_perla For permiso_laboral
    Active Before Update
  as
    Begin
    If (New.modificacion Is null) Then
      New.modificacion = current_timestamp;
    End ;
^

Commit work^
/*.............................. PROCEDURE(S) ..............................*/
Create Procedure perla_Key_Gen
   Returns( Avalue Integer)
      As
         Begin
         aValue = Gen_id(perla_Id_Gen,1);
         End
^
Commit work^
set term ; ^

/*.............................. PERMISOS ..............................*/
Grant all on permiso_laboral To Public;
Grant Execute on Procedure perla_Key_Gen  To Public;


/************************************************************************** */
/************************************************************************** */
/************************************************************************** */
/************************************************************************** */


/****************************** Tabla: AUTORIZACIONES ******************************/
/****************************** Tabla: AUTORIZACIONES ******************************/
Create Table autorizaciones(
                        autor_id Tid
                                Constraint autor_Id_NN Not Null
                                Constraint autor_key Primary Key,
                        autor_autoriza  tid
                                Constraint autor_lnk_usuar
                                        References usuarios (usuar_id)
                                                on Delete Cascade
                                                        on Update Cascade,
                        Modificacion  timestamp,
                        perla_id Integer
                                Constraint autor_perla_id_NN Not Null
                                Constraint autor_id_lnk_perla
                                         References permiso_laboral(perla_id)
                                                on Delete Cascade
                                                on Update Cascade,
                        autor_autorizacion tBoolean );

/*.............................. GENERADORE(S) ..............................*/
Create Generator autor_Id_Gen;
Commit work;

/*.............................. TRIGGER(S) ..............................*/
Set term ^;
Create trigger
  Alta_autor For autorizaciones
    Active Before Insert
  as
    Begin
    If (New.autor_Id Is null) Then
      New.autor_Id = Gen_id(autor_Id_Gen,1);
    If (New.modificacion Is null) Then
      New.modificacion = current_timestamp;
    End ;
^

Create trigger
  Modif_autor For autorizaciones
    Active Before Update
  as
    Begin
    If (New.modificacion Is null) Then
      New.modificacion = current_timestamp;
    End ;
^

Commit work^
/*.............................. PROCEDURE(S) ..............................*/
Create Procedure autor_Key_Gen
   Returns( Avalue Integer)
      As
         Begin
         aValue = Gen_id(autor_Id_Gen,1);
         End
^
Commit work^
set term ; ^

/*.............................. PERMISOS ..............................*/
Grant all on autorizaciones To Public;
Grant Execute on Procedure autor_Key_Gen  To Public;

/*****************************  vistas  *********************************/
SELECT r.PERLA_ID,  r.MODIFICACION,  r.PERLA_DIA_INICIAL,
    r.PERLA_HORA_INICIAL, r.PERLA_HORA_FINAL, r.PERLA_DIA_FINAL, 
    r.PERLA_OBSERVACIONES, r.PERLA_TIPO,  e.VARIA_CADENA estado,
    a.VARIA_CADENA asunto,
    p.PERSO_NOMBRE
// se crea tabla vpermisos
create table vPermisoLaboral  ( 
                        perla_Id Tid
                                Constraint vperla_Id_NN Not Null
                                Constraint vperla_key Primary Key,
                        Modificacion  timestamp,
                        perla_dia_inicial Date,
                        perla_hora_inicial Time ,
                        perla_hora_final Time ,
                        perla_dia_final Date ,
                        perla_observaciones tsNombreXXL,
                        estado     tsNombreLP ,    
                        asunto      tsNombreLP ,    
                        solicitante tsnombrexl, 
                        firmante1  tsnombrexl, 
                        frimante2  tsnombrexl);

// aqui se crea el crud

drop table vPermisoLaboral;

// luego el view 
create view vPermisoLaboral  as  
SELECT r.PERLA_ID,  r.MODIFICACION,  r.PERLA_DIA_INICIAL,
    r.PERLA_HORA_INICIAL, r.PERLA_HORA_FINAL, r.PERLA_DIA_FINAL, 
    r.PERLA_OBSERVACIONES, r.PERLA_TIPO,  e.VARIA_CADENA estado,
    a.VARIA_CADENA asunto,
    p.PERSO_NOMBRE solicitante,
    p1.PERSO_NOMBRE firmante1,
    p2.PERSO_NOMBRE firmante2 
    
FROM PERMISO_LABORAL r
join variables  e on  r.ESTAD_ID =  e.VARIA_ID
join variables a on r.PERLA_ASUNTO =  a.VARIA_ID
join EMPLEADOS em on r.EMPLE_ID =  em.EMPLE_ID
join personas p on em.PERSO_ID =  p.Perso_id
left join usuarios f1 on r.perla_firmante_1 = f1.usuar_id 
left join empleados e1 on f1.USUAR_RELACION_ID =e1.EMPLE_ID
left join personas p1 on p1.PERSO_ID =  e1.PERSO_ID

left join usuarios f2 on r.perla_firmante_2= f2.usuar_id
left join empleados e2 on f2.USUAR_RELACION_ID =e2.EMPLE_ID
left join personas p2 on p2.PERSO_ID =  e2.PERSO_ID














