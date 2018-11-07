/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  jani
 * Created: 25/06/2018
 */


/******************************nolaborales******************************/
Create Table nolaborales(nolab_Id Tid Constraint nolab_Id_NN Not Null
                                      Constraint nolab_key Primary Key,
                         nolab_dia date
                                      Constraint nolab_dia_NN Not Null, 
                         nolab_motivo tsNombre);
 
Create Generator nolab_Id_Gen;
Commit work;

Set term ^; 
Create trigger 
   Alta_nolab For nolaborales
   Active Before Insert
   as 
       Begin
       If (New.nolab_Id Is null) Then
          New.nolab_Id = Gen_id(nolab_Id_Gen,1);
       End ;
^
Commit work^
Create Procedure nolab_Key_Gen 
   Returns( Avalue Integer)
      As
         Begin
         aValue = Gen_id(nolab_Id_Gen,1);
         End
^

set term ; ^

Grant all on nolaborales To Public;
Grant Execute on Procedure nolab_Key_Gen  To Public;


