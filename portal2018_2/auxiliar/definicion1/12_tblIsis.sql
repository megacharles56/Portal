/******************************bibllio_autor******************************/ 
CREATE TABLE ISIS ( ISIS_Id Tid Constraint ISIS_Id_NN Not Null
                                Constraint Isis_key Primary Key,
                    Estad_Id      tid 
                                Constraint ISIS_Estad_id_NN Not Null 
                                Constraint ISIS_lnk_Estad
                                        References Variables (varia_id) 
                                                on Delete Cascade
                                                on Update Cascade,                                
                    autor tid 
                               Constraint autor_ISIS_NN Not Null
                               Constraint pForm_lnk_ISIS
                                   References Personas(Perso_ID) 
                                       on Delete Cascade
                                       on Update Cascade,
                   Modificacion  timestamp,                                  
                    
                  ISIS_ACCESO integer,
                  ISIS_UBICACION VARCHAR( 64),
                  ISIS_AUTOR_PERSONAL VARCHAR( 128),
                  ISIS_AUTOR_INSTITUCIONAL VARCHAR( 128),
                  ISIS_TITULO VARCHAR( 256),
                  ISIS_PAGINAS VARCHAR( 64),
                  ISIS_VOLUMEN VARCHAR( 4),
                  ISIS_MENCION_RESPONSABILIDAD VARCHAR( 256),
                  ISIS_PUBL_SERIE VARCHAR( 128),
                  ISIS_PUBL_VOLUMEN VARCHAR( 16),
                  ISIS_PUBL_NUMERO VARCHAR( 16),
                  ISIS_PUBL_EXISTENCIAS VARCHAR( 4),
                  ISIS_PUBL_ISSN VARCHAR( 64),
                  ISIS_EDITORIAL VARCHAR( 128),
                  ISIS_CIUDAD_EDITORIAL VARCHAR( 64),
                  ISIS_PAIS_EDITORIAL VARCHAR( 8),
                  ISIS_EDICION VARCHAR( 64),
                  ISIS_DESCRIPTIVA VARCHAR( 64),
                  ISIS_FECHA_PUBLICACION VARCHAR( 64),
                  ISIS_FECHA_NORMALIZADA VARCHAR( 16),
                  ISIS_ISBN VARCHAR( 64),
                  ISIS_IMPRESION VARCHAR( 16),
                  ISIS_IDIOMA_TEXTO VARCHAR( 8),
                  ISIS_IDIOMA_RESUMEN VARCHAR( 4),
                  ISIS_NUM_REFERENCIAS VARCHAR( 32),
                  ISIS_NOTAS VARCHAR( 256),
                  ISIS_DESDE VARCHAR( 32),
                  ISIS_HASTA VARCHAR( 32),
                  ISIS_DESCRIPTORES VARCHAR( 512),
                  ISIS_TEMATICA VARCHAR( 64),
                  ISIS_CATEGORIA_GEOGRAFICA VARCHAR( 16),
                  ISIS_RESUMEN VARCHAR( 64),
                  ISIS_EJEMPLARES VARCHAR( 4),
                  ISIS_PRECIO_UNITARIO VARCHAR( 8),
                  ISIS_ADQUISICION VARCHAR( 16),
                  ISIS_NUM_ADQUISICION VARCHAR( 128)
);

Create Generator Isis_Id_Gen;
Commit work;

Set term ^; 
Create trigger 
   Alta_Isis For ISIS
   Active Before Insert
   as 
       Begin
       If (New.Isis_Id Is null) Then
          New.Isis_Id = Gen_id(Isis_Id_Gen,1);
       new.modificacion = current_timestamp; 
       End ;
^
Create trigger 
   Modif_Isis For ISIS
   Active Before update
   As
      Begin
       If (New.modificacion Is null) Then 
         new.modificacion = current_timestamp; 
      End;
^

Commit work^
Create Procedure Isis_Key_Gen 
   Returns( Avalue Integer)
      As
         Begin
         aValue = Gen_id(Isis_Id_Gen,1);
         End
^
Commit work^

set term ; ^

Grant all on ISIS To Public;
Grant Execute on Procedure Isis_Key_Gen  To Public;
