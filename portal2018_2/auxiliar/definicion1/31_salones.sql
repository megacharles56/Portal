/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  develop0
 * Created: 24/07/2018
 */

/******************************Salones******************************/
Create Table Salones(salon_Id Tid 
                                Constraint salon_Id_NN Not Null
                                Constraint salon_key Primary Key,
                     salon_Nombre tsNombre
                                Constraint salon_Nombre_NN Not Null, 
                     salon_ubicacion tid
                                Constraint salon_ubicacion_NN Not Null
                                Constraint salon_lnk_varia_id
                                    References variables(varia_id)
                                        on update Cascade
                                        on Delete Cascade);
 
Create Generator salon_Id_Gen;
Commit work;

Set term ^; 
Create trigger 
   Alta_salon For Salones
   Active Before Insert
   as 
       Begin
       If (New.salon_Id Is null) Then
          New.salon_Id = Gen_id(salon_Id_Gen,1);
       End ;
^
Commit work^
Create Procedure salon_Key_Gen 
   Returns( Avalue Integer)
      As
         Begin
         aValue = Gen_id(salon_Id_Gen,1);
         End
^

set term ; ^

Grant all on Salones To Public;
Grant Execute on Procedure salon_Key_Gen  To Public;

/******************************salones_ligados******************************/
Create Table salones_ligados(salig_Id Tid 
                                Constraint salig_Id_NN Not Null
                                Constraint salig_key Primary Key,
                             salon_id tid
                                Constraint salig_salon_id_NN Not Null
                                Constraint salig_lnk_salon_id
                                    References salones(salon_id)
                                        on Delete Cascade
                                        on update Cascade);
ALTER TABLE SALONES_LIGADOS ADD 
salig_salon_ligado TID 
 Constraint salig_salon_id_NN Not Null
                                Constraint salig_salon_lnk_salon_id
                                    References salones(salon_id)
                                        on Delete Cascade
                                        on update Cascade;
 
Create Generator salig_Id_Gen;
Commit work;

Set term ^; 
Create trigger 
   Alta_salig For salones_ligados
   Active Before Insert
   as 
       Begin
       If (New.salig_Id Is null) Then
          New.salig_Id = Gen_id(salig_Id_Gen,1);
       End ;
^
Commit work^
Create Procedure salig_Key_Gen 
   Returns( Avalue Integer)
      As
         Begin
         aValue = Gen_id(salig_Id_Gen,1);
         End
^

set term ; ^

Grant all on salones_ligados To Public;
Grant Execute on Procedure salig_Key_Gen  To Public;



