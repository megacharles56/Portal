/******************************ContadorPagina******************************/
Create Table ContadorPagina(conpa_Id Tid Constraint conpa_Id_NN Not Null
                                      Constraint conpa_key Primary Key,
                            conpa_cantidad integer,
                            conpa_pagina tsNombreL);
 
Create Generator conpa_Id_Gen;

Commit work;

Set term ^; 
Create trigger 
   Alta_conpa For ContadorPagina
   Active Before Insert
   as 
       Begin
       If (New.conpa_Id Is null) Then
          New.conpa_Id = Gen_id(conpa_Id_Gen,1);
       End ;
^
Commit work^
Create Procedure conpa_Key_Gen 
   Returns( Avalue Integer)
      As
         Begin
         aValue = Gen_id(conpa_Id_Gen,1);
         End
^
Commit work^

set term ; ^

Grant all on ContadorPagina To Public;
Grant Execute on Procedure conpa_Key_Gen  To Public;

