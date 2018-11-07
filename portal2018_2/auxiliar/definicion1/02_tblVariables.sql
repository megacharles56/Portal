 /****************************** Tabla: VARIABLES ******************************/
Create Table Variables( 
                        Varia_Id Tid
                                Constraint Varia_Id_NN Not Null
                                Constraint Varia_key Primary Key,
                        Modificacion  timestamp, 
                        Varia_Tabla tsnombre ,
                        Varia_Campo tsnombre ,
                        Varia_Cadena tsNombreLP ,           
                        Varia_extra tsNombreLP,           
                        Varia_info tsNombreLP,           
                        Varia_numerico tMonetario,
                        Varia_Fecha date );
/* Contraints unique */
   ALTER TABLE variables  
ADD CONSTRAINT tblfld_varia_unk 
        UNIQUE ( VARIA_TABLA, VARIA_CAMPO,
                 VARIA_CADENA, VARIA_NUMERICO,
                 VARIA_FECHA);
/*.............................. GENERADORE(S) ..............................*/
Create Generator Varia_Id_Gen;
/*.............................. TRIGGER(S) ..............................*/
Set term ^; 
Create trigger 
  Alta_vari For Variables
    Active Before Insert
  as 
    Begin
    If (New.Varia_Id Is null) Then
      New.Varia_Id = Gen_id(Varia_Id_Gen,1);
    If (New.modificacion Is null) Then 
      New.modificacion = current_timestamp;
    End ;
^

Create trigger 
  Modif_vari For Variables
    Active Before Update
  as 
    Begin
    If (New.modificacion Is null) Then 
      New.modificacion = current_timestamp;
    End ;
^

Commit work^
/*.............................. PROCEDURE(S) ..............................*/
Create Procedure Varia_Key_Gen
   Returns( Avalue Integer)
      As
         Begin
         aValue = Gen_id(Varia_Id_Gen,1);
         End
^
Commit work^
set term ; ^

/*.............................. PERMISOS ..............................*/
Grant all on Variables To Public;
Grant Execute on Procedure Varia_Key_Gen  To Public;

/*:::::::::::::::::::::::  DATOS :::::::::::::::::::::::::::::::::::::::*/
INSERT INTO VARIABLES ( VARIA_TABLA, VARIA_CAMPO, VARIA_CADENA)
 VALUES ( '*',  'ESTADO', 'ACTIVO'  );
INSERT INTO VARIABLES ( VARIA_TABLA, VARIA_CAMPO, VARIA_CADENA)
 VALUES ( '*', 'ESTADO', 'ELIMINADO' );
INSERT INTO VARIABLES ( VARIA_TABLA, VARIA_CAMPO, VARIA_CADENA)
 VALUES ( '*', 'ESTADO', 'ALTA' );
INSERT INTO VARIABLES ( VARIA_TABLA, VARIA_CAMPO, VARIA_CADENA)
 VALUES ( '*', 'ESTADO', 'ENTREGADO' );
INSERT INTO VARIABLES ( VARIA_TABLA, VARIA_CAMPO, VARIA_CADENA)
 VALUES ( '*', 'ESTADO', 'EVALUACION' );
INSERT INTO VARIABLES ( VARIA_TABLA, VARIA_CAMPO, VARIA_CADENA)
 VALUES ( '*', 'ESTADO', 'EN ATENCION' );
INSERT INTO VARIABLES ( VARIA_TABLA, VARIA_CAMPO, VARIA_CADENA)
 VALUES ( '*', 'ESTADO', 'CALIFICADO' );
INSERT INTO VARIABLES ( VARIA_TABLA, VARIA_CAMPO, VARIA_CADENA)
 VALUES ( '*', 'ESTADO', 'SOLICITADO' );
INSERT INTO VARIABLES ( VARIA_TABLA, VARIA_CAMPO, VARIA_CADENA)
 VALUES ( '*', 'ESTADO', 'DENEGADO' );
INSERT INTO VARIABLES ( VARIA_TABLA, VARIA_CAMPO, VARIA_CADENA)
 VALUES ( '*', 'GENERO', 'MASCULINO' );
INSERT INTO VARIABLES ( VARIA_TABLA, VARIA_CAMPO, VARIA_CADENA)
 VALUES ( '*', 'GENERO', 'FEMENINO' );
INSERT INTO VARIABLES ( VARIA_TABLA, VARIA_CAMPO, VARIA_CADENA)
 VALUES ( '*', 'GENERO', 'INDISTINTO' ); 
INSERT INTO VARIABLES ( VARIA_TABLA, VARIA_CAMPO, VARIA_CADENA)
 VALUES ( '*', 'ESTADO CIVIL', 'CASADO' );
INSERT INTO VARIABLES ( VARIA_TABLA, VARIA_CAMPO, VARIA_CADENA)
 VALUES ( '*', 'ESTADO CIVIL', 'SOLTERO' );
INSERT INTO VARIABLES ( VARIA_TABLA, VARIA_CAMPO, VARIA_CADENA)
 VALUES ( '*', 'ESTADO CIVIL', 'INDISTINTO' );
INSERT INTO VARIABLES ( VARIA_TABLA, VARIA_CAMPO, VARIA_CADENA)
 VALUES ( '*', 'EDUCACION', 'BASICA' );
INSERT INTO VARIABLES ( VARIA_TABLA, VARIA_CAMPO, VARIA_CADENA)
 VALUES ( '*', 'EDUCACION', 'MEDIA SUPERIOR' );
INSERT INTO VARIABLES ( VARIA_TABLA, VARIA_CAMPO, VARIA_CADENA)
 VALUES ( '*', 'EDUCACION', 'SUPERIOR' );
INSERT INTO VARIABLES ( VARIA_TABLA, VARIA_CAMPO, VARIA_CADENA)
 VALUES ( 'ESTRUCTURA_ORGANICA', 'ESTOR_TIPO_ESTRUCTURA', 'DIRECCIóN' );
INSERT INTO VARIABLES ( VARIA_TABLA, VARIA_CAMPO, VARIA_CADENA)
 VALUES ( 'ESTRUCTURA_ORGANICA', 'ESTOR_TIPO_ESTRUCTURA', 'GERENCIA' ); 
INSERT INTO VARIABLES ( VARIA_TABLA, VARIA_CAMPO, VARIA_CADENA)
 VALUES ( 'ESTRUCTURA_ORGANICA', 'ESTOR_TIPO_ESTRUCTURA', 'DEPARTAMENTO' );
INSERT INTO VARIABLES ( VARIA_TABLA, VARIA_CAMPO, VARIA_CADENA)
 VALUES ( 'ESTRUCTURA_ORGANICA', 'ESTOR_TIPO_ESTRUCTURA', 'JEFATURA' );
  
commit;