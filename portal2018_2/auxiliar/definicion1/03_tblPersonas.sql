/****************************** Tabla: PERSONAS ******************************/
Create Table Personas( 
                        Perso_Id      tid
                                Constraint Perso_Id_NN Not Null
                                Constraint Perso_key Primary Key,
                        Modificacion  timestamp, 
                        Estad_Id      tid 
                                Constraint Perso_Estad_id_NN Not Null 
                                Constraint Perso_lnk_Estad
                                        References Variables (varia_id) 
                                                on Delete Cascade
                                                on Update Cascade,
                        Autor  tid  
                                Constraint autor_lnk_Perso
                                        References Personas (Perso_id) 
                                                on Delete Cascade
                                                on Update Cascade,
                        Historia BLOB SUB_TYPE TEXT,
                                                
                        Perso_Nombre1 tsNombre 
                                Constraint Perso_Nombre1_NN Not Null,
                        Perso_Nombre2 tsnombre ,
                        Perso_Nombre3 tsnombre ,
                        Perso_Paterno tsnombre 
                                Constraint Perso_Paterno_NN Not Null,
                        Perso_Materno tsnombre ,
                        Perso_Titulo  tsnombre ,
                        Perso_SobreNombre tsnombre ,
                        Perso_RFC     char(13) unique,
                        Perso_CURP    char(18) unique,
                        Perso_nombre  computed by 
                            ( PERSO_NOMBRE1 || ' '||
                              coalesce( PERSO_NOMBRE2||' ', '')||
                              coalesce( PERSO_NOMBRE3||' ', '')||
                              PERSO_PATERNO || ' '||
                              coalesce( PERSO_MATERNO||'', '')),
                        Perso_Nacionalidad tsNombre,
                        Perso_Fecha_Nacimiento  date,  
                        Perso_Sexo  tsNombreC,
                        Domic_id  tid  
                                Constraint domic_lnk_perso
                                        References domicilios (domic_id) 
                                                on Delete Cascade
                                                on Update Cascade                        
                        );

/*.............................. GENERADORE .................................*/
Create Generator Perso_Id_Gen;
/*.............................. TRIGGER(S) .................................*/
Set term ^; 
Create trigger 
  Alta_Perso For Personas
    Active Before Insert
  as 
    Begin
    If (New.Perso_Id Is null) Then
      New.Perso_Id = Gen_id(Perso_Id_Gen,1);
    If (New.modificacion Is null) Then 
      New.modificacion = current_timestamp;
    End ;
^

SET TERM ; ^

commit work;    