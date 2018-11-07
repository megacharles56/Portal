/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  develop0
 * Created: 25/09/2018
 */

/******************************archivos******************************/
Create Table archivos(
                        archi_Id Tid Constraint archi_Id_NN Not Null
                                   Constraint archi_key Primary Key,
                        autor tid
                                Constraint autor_archi_NN Not Null
                                Constraint archi_lnk_Perso
                                        References Personas(Perso_ID)
                                                on Delete Cascade
                                                on Update Cascade,
                        emple_id tid
                                Constraint emple_id_archi_NN Not Null
                                Constraint archi_lnk_emple
                                        References empleados(emple_ID)
                                                on Delete Cascade
                                                on Update Cascade,
                        Modificacion  timestamp,
                        archi_archivo tsNombre,
                        archi_nombre tsNombre,
                        archi_destinatario tid
                                Constraint archi_destinatario_NN Not Null
                                Constraint archi__destinatario_lnk_emple
                                        References empleados(emple_ID)
                                                on Delete Cascade
                                                on Update Cascade
);
 
Create Generator archi_Id_Gen;
Commit work;

Set term ^; 
Create trigger 
   Alta_archi For archivos
   Active Before Insert
   as 
       Begin
       If (New.archi_Id Is null) Then
          New.archi_Id = Gen_id(archi_Id_Gen,1);
       new.modificacion = current_timestamp; 
       End ;
^
Create trigger 
   Modif_archi For archivos
   Active Before update
   As
      Begin
         new.modificacion = current_timestamp; 
      End;
^
Commit work^
Create Procedure archi_Key_Gen 
   Returns( Avalue Integer)
      As
         Begin
         aValue = Gen_id(archi_Id_Gen,1);
         End
^

set term ; ^

Grant all on archivos To Public;
Grant Execute on Procedure archi_Key_Gen  To Public;


