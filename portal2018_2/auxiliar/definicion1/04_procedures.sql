/*Procedimientos*/

/******************* TraeCambio *************************/
SET TERM ^ ;
create or alter 
 PROCEDURE TRAECAMBIO (
    NOMBRECAMPO TSNOMBRE1X,
    VALORCAMPOO TSNOMBRE3X,
    VALORCAMPON TSNOMBRE3X,
    TEMP TSNOMBRE3X,
    SEP Char(2) )
RETURNS (
    TEMPORAL TSNOMBRE3X,
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
    Modificacion timeStamp, Autor Tid, Temporal tsNombre3X, Oldhistoria Tsnombre3x 
 )
Returns ( Historia Tsnombre3x ) As 
   Declare Cambio Tsnombre3x;
   Declare Crlf Char(2);
   Declare Nombre tsNombre1x;
Begin

  If (Autor is not null) then
     Select Perso_Nombre 
       From Personas 
      Where Perso_Id = autor 
       Into :Nombre ;
  else
     nombre = '-';  


  Crlf = Ascii_Char(10);
  Cambio = '<Modificacion>'||Crlf|| 
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
  Historia =  Coalesce( Historia,'.') || Temporal || 
                  '</Modificacion>';  

  Suspend;
End^

Set Term ; ^

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
 
 
