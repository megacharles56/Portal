/****************************** Tabla: clases ******************************/
Create Table Clases(
    clase_id Tid
            Constraint clase_Id_NN Not Null
            Constraint clase_key Primary Key,
    clase_clase tsnombrelp
            Constraint clase_clase_NN Not Null
  );

/*.............................. GENERADORE(S) ..............................*/
Create Generator clase_Id_Gen;
/*.............................. TRIGGER(S) ..............................*/
Set term ^;
Create trigger
 Alta_clase For clases
    Active Before Insert
  as
    Begin
    If (New.clase_Id Is null) Then
      New.clase_Id = Gen_id(clase_Id_Gen,1);
    End ;
^

Commit work^
/*.............................. PROCEDURE(S) ..............................*/
Create Procedure clase_Key_Gen
   Returns( Avalue Integer)
      As
         Begin
         aValue = Gen_id(clase_Id_Gen,1);
         End
^
Commit work^
set term ; ^

/*.............................. PERMISOS ..............................*/
Grant all on clases To Public;
Grant Execute on Procedure clase_Key_Gen  To Public;


/****************************** Tabla: permisos ******************************/
/* solo se agfreegarna reglas que "den" permiso, si no esta
permitido expresamente estar vedado*/
CREATE TABLE permisos (
  `permi_id` int(11) NOT NULL primary key auto_increment ,
  permi_id Tid
          Constraint permi_Id_NN Not Null
          Constraint permi_key Primary Key,
  permi_metodo tsnombrelp ,
  permi_campo tsnombrelp ,
  clase_id  tid
          Constraint clase_permi_id_NN Not Null
          Constraint clase_lnk_permi
                  References clases (clase_id)
                          on Delete Cascade
                          on Update Cascade,
  permi_nivel integer DEFAULT 0
  /* indicara que registro puede ver :
    0 solo los suyos
    1 suyos y de subalternos
    2 todos */
);

/*.............................. GENERADORE(S) ..............................*/
Create Generator permi_Id_Gen;
/*.............................. TRIGGER(S) ..............................*/
Set term ^;
Create trigger
 Alta_permi For permisos
    Active Before Insert
  as
    Begin
    If (New.permi_Id Is null) Then
      New.permi_Id = Gen_id(permi_Id_Gen,1);
    End ;
^

Commit work^
/*.............................. PROCEDURE(S) ..............................*/
Create Procedure permi_Key_Gen
   Returns( Avalue Integer)
      As
         Begin
         aValue = Gen_id(permi_Id_Gen,1);
         End
^
Commit work^
set term ; ^

/*.............................. PERMISOS ..............................*/
Grant all on permisos To Public;
Grant Execute on Procedure permi_Key_Gen  To Public;


/****************************** Tabla: ROLES ******************************/
CREATE TABLE roles(
  rol_id  Tid
          Constraint rol_Id_NN Not Null
          Constraint rol_key Primary Key,
  rol_nombre tsnombrel
          Constraint rol_nombre_NN Not Null
          Constraint rol_nombre_unk unique
);

/*.............................. GENERADORE(S) ..............................*/
Create Generator rol_Id_Gen;
/*.............................. TRIGGER(S) ..............................*/
Set term ^;
Create trigger
 Alta_rol For roles
    Active Before Insert
  as
    Begin
    If (New.rol_Id Is null) Then
      New.rol_Id = Gen_id(rol_Id_Gen,1);
    End ;
^

Commit work^
/*.............................. PROCEDURE(S) ..............................*/
Create Procedure rol_Key_Gen
   Returns( Avalue Integer)
      As
         Begin
         aValue = Gen_id(rol_Id_Gen,1);
         End
^
Commit work^
set term ; ^

/*.............................. PERMISOS ..............................*/
Grant all on clases To Public;
Grant Execute on Procedure rol_Key_Gen  To Public;






/************************  rol_permisos  *************************************/

CREATE TABLE rol_permisos (
  rolpe_id  Tid
          Constraint rolpe_Id_NN Not Null
          Constraint rolpe_key Primary Key,
  rol_id  tid
          Constraint clase_permi_id_NN Not Null
          Constraint clase_lnk_permi
                    References clases (clase_id)
                            on Delete Cascade
                            on Update Cascade,




  permi_id int(11) NOT NULL
)
