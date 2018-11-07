/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  jani
 * Created: 18/06/2018
 */

/******************************rol_menu******************************/
Create Table rol_menu(rolme_Id Tid Constraint rolme_Id_NN Not Null
                                   Constraint rolme_key Primary Key,
                      rol_id tId
                                   Constraint rolme_lnk_rol_id
                      References roles(rol_id)
                        on Delete Cascade
                        on Update Cascade, 
                      rolme_label tsNombreLP
                                   Constraint rolme_label_NN Not Null, 
                      rolme_url tsNombreLP 
                                   Constraint rolme_url_NN Not Null);
 
Create Generator rolme_Id_Gen;
Commit work;

Set term ^; 
Create trigger 
   Alta_rolme For rol_menu
   Active Before Insert
   as 
       Begin
       If (New.rolme_Id Is null) Then
          New.rolme_Id = Gen_id(rolme_Id_Gen,1);
       End ;
^
Commit work^
Create Procedure rolme_Key_Gen 
   Returns( Avalue Integer)
      As
         Begin
         aValue = Gen_id(rolme_Id_Gen,1);
         End
^

set term ; ^

Grant all on rol_menu To Public;
Grant Execute on Procedure rolme_Key_Gen  To Public;


