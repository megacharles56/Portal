/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  develop0
 * Created: 6/07/2018
 */

/******************************almacen******************************/
Create Table almacen(almac_id Tid Constraint almac_Id_NN Not Null
                                  Constraint almac_key Primary Key,
                     almac_producto tsNombreXL
                                  Constraint almac_producto_NN Not Null, 
                     almac_clave integer, 
                     almac_seccion tId
                                  Constraint almac_seccion_NN Not Null
                                  Constraint almac_lnk_varia_id
                     References variables(varia_id)
                     on Delete Cascade
                     on update cascade);
 
Create Generator almac_Id_Gen;
Commit work;

Set term ^; 
Create trigger 
   Alta_almac For almacen
   Active Before Insert
   as 
       Begin
       If (New.almac_Id Is null) Then
          New.almac_Id = Gen_id(almac_Id_Gen,1);
       End ;
^
Commit work^
Create Procedure almac_Key_Gen 
   Returns( Avalue Integer)
      As
         Begin
         aValue = Gen_id(almac_Id_Gen,1);
         End
^

set term ; ^

Grant all on almacen To Public;
Grant Execute on Procedure almac_Key_Gen  To Public;


