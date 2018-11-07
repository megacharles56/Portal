/*Procedimientos*/


/*

create domain tsnombrec   as varchar(12)   collate UTF8;
create domain tsnombre    as varchar(24)   collate UTF8;
create domain tsnombrel   as varchar(48)   collate UTF8;
create domain tsnombrelp  as varchar(64)   collate UTF8;
create domain tsnombrexl  as varchar(128)  collate UTF8;
create domain tsnombrexxl as varchar(256)  collate UTF8;
create domain tsnombre1x  as varchar(512)  collate UTF8;
create domain tsnombre2x  as varchar(1024) collate UTF8;
create domain tsnombre3x  as varchar(2048) collate UTF8;


*/

/******************* TraeCambio *************************/
SET TERM ^ ;
create or alter 
 PROCEDURE TRAECAMBIO (
   in NOMBRECAMPO varchar(512),
   	 VALORCAMPOO varchar(2048),
    VALORCAMPON varchar(2048),
    TEMP varchar(2048),
    SEP Char(2) )
RETURNS (
    TEMPORAL varchar(2048),
    SEPARADOR Char(2) )
AS
Declare Crlf Char(2);
   Declare Cambio Tsnombre3x;
Begin
Crlf = Ascii_Char(10);
Separador = ' '; 

If (Valorcampon Is Distinct From Valorcampoo ) Then
   Begin
   Cambio = '<Cambio>' ||Crlf ||
            '<Nombrecampo>'||Nombrecampo||'</Nombrecampo>'||Crlf||
            '<Valorcampo>'||Coalesce(Valorcampoo, '[Vacio]')||'</Valorcampo>'||Crlf||
            '</Cambio>';
   Temporal = Trim( Coalesce( Temp, ' ')||Sep||Cambio);
   Separador = Crlf; 
   End
else 
   begin
   Temporal = coalesce(Temp,  ' ');
     
   end
   Suspend;
End^
SET TERM ; ^


GRANT EXECUTE
 ON PROCEDURE TRAECAMBIO TO  "PUBLIC";

GRANT EXECUTE
 ON PROCEDURE TRAECAMBIO TO  SYSDBA;
/*************************/
/* corregido para mysql  */


delimiter ^;
create  
 PROCEDURE TRAECAMBIO (
  in  NOMBRECAMPO varchar(512),
  in   VALORCAMPOO varchar(2048),
  in  VALORCAMPON varchar(2048),
  in  TEMP varchar(2048),
  in  SEP Char(2), 
  out  TEMPORAL varchar(2048),
  out  SEPARADOR Char(2) )
  
Begin   
   Declare Crlf Char(2);
   Declare Cambio varchar(2048);
   set Crlf = Ascii_Char(10);
   set separador = ' '; 
   If (Valorcampon <>  Valorcampoo ) Then
        set Cambio = CONCAT_WS ( Crlf,'<Cambio>' ,'<Nombrecampo>',Nombrecampo,'</Nombrecampo>',  
                               '<Valorcampo>',Coalesce(Valorcampoo,
                               '[Vacio]'),'</Valorcampo>','</Cambio>'); 
        set Temporal = Trim( Coalesce( Temp, ' ')||Sep||Cambio);
        set Separador = Crlf;    
    else 
       set Temporal = coalesce(Temp,  ' ');
    end if;
    /*Suspend;*/
end;



/**************Corregido para mySql **********************/






/*
--------- uso --------
    SELECT TEMPORAL, SEPARADOR
    FROM AGREGACAMBIOVC('NOMBRE2', old.PERSO_NOMBRE2, 
                        new.PERSO_NOMBRE2, :temporal, :separador) 
      into :TEMPORAL, :SEPARADOR;

-------- Generador ----
Select ' Select Temporal, Separador
      From TraeCambio(' || Rdb$Field_Name 
                 || ', Old.' || Rdb$Field_Name||', '||Ascii_Char(10)
                 || ' New.' || Rdb$Field_Name || ', :Temporal, :Separador )' ||Ascii_Char(10)
                 || 'into :Temporal, :Separador; '
    From Rdb$Relation_Fields
Where Rdb$Relation_Name = 'empleados';
*/
 /********************* GeneraCambios  *********************************/
set Term ^ ;

Create Or Alter Procedure GeneraCambios (
    in Modificacion timeStamp, 
    in  Autor integer, 
    in Temporal varchar(2048),
    in  Oldhistoria varchar(2048) ,
    out Historia Tsnombre3x ) 

Begin

   Declare Cambio varchar(2048);
   Declare Crlf Char(2);
   Declare Nombre varchar(2048);

  If (Autor is not null) then
     Select Perso_Nombre 
       From Personas 
      Where Perso_Id = autor 
       Into :Nombre ;
  else
     set nombre = '-';  
  end if;

  set Crlf = Ascii_Char(10);
  set Cambio = '<Modificacion>'||Crlf|| 
             '<Fecha>' ||Modificacion ||'</Fecha>' ||Crlf||
             '<Autorid>'||Coalesce(  Autor,'-')||
             '</Autorid>'||Crlf|| 
             '<Autornombre>'||Coalesce( Nombre, '-')||
             '</Autornombre>';
  If (Oldhistoria Is Null) Then
     Historia = '<?xml version="1.0" encoding="Windows-1250"?>'|| Crlf||
                    '<Modificaciones>' || Crlf || 
                    Cambio;
  Else
     Historia = Oldhistoria||Crlf || :Cambio;
  end if; 
  set Historia =  Coalesce( Historia,'.') || Temporal || 
                  '</Modificacion>';  

  Suspend;
End;
^

Set Term ; ^


/********* corregido par mySql  *************/

Create  Procedure GeneraCambios (
    in Modificacion timeStamp, 
    in  Autor integer, 
    in Temporal varchar(2048),
    in  Oldhistoria varchar(2048) ,
    out Historia varchar(2048) ) 

Begin
   Declare Cambio varchar(2048);
   Declare Crlf Char(2);
   Declare Nombre varchar(2048);

  If (Autor is not null) then
     Select Perso_Nombre 
       From Personas 
      Where Perso_Id = autor 
       Into Nombre ;
  else
     set nombre = '-';  
  end if;

  set Crlf = Ascii_Char(10);
  set Cambio = '<Modificacion>'||Crlf|| 
             '<Fecha>' ||Modificacion ||'</Fecha>' ||Crlf||
             '<Autorid>'||Coalesce(  Autor,'-')||
             '</Autorid>'||Crlf|| 
             '<Autornombre>'||Coalesce( Nombre, '-')||
             '</Autornombre>';
  If (Oldhistoria Is Null) Then
     set Historia = '<?xml version="1.0" encoding="Windows-1250"?>'|| Crlf||
                    '<Modificaciones>' || Crlf || 
                    Cambio;
  Else
     set Historia = Oldhistoria||Crlf || Cambio;
  end if; 
  set Historia =  Coalesce( Historia,'.') || Temporal || 
                  '</Modificacion>';  

  
End

/********************************************/



Grant Execute
 On Procedure GeneraCambios To  Public;


 CREATE EXCEPTION Mensaje 'Trace: ';
      

 Commit;
 /*  
 ------------ uso -------------
    If (:TEMPORAL <> '') then 
      begin
      Select Perso_Nombre 
        From Personas 
       Where Perso_Id = Old.Perso_Id 
        Into :Nombre ;
        
      select historia 
        from GENERACAMBIOVC (Old.modificacion, old.autor,  
                             Nombre, old.Historia ) 
        into new.Historia;
      end
      
exception Mensaje coalesce(:temporal, '[Temporal]');      
      
      
 */
 
 
