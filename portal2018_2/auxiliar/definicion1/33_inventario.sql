/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  develop0
 * Created: 10/08/2018
 */
/*
Inv                 
Artículo             catalogou     
Descripción
Característica
Tipo de Artículo    catalogo
Color         variABLES
Material      variables
Marca
Modelo
Serie    
Colocación Etiqueta  variables
Observaciones
Estado     variables
Usuario    perso_id
Área       //
Direccion   ///
Piso    variables
Edificio   variables
Alta  date
Actualización   date 

*/

/******************************tipos_articulo******************************/
Create Table tipos_articulo(tiart_Id Tid Constraint tiart_Id_NN Not Null
                                         Constraint tiart_key Primary Key,
                            tiart_nombre tsNombreLP
                                         constraint tiart_nombre_nombre_NN  Not Null);
Create Generator tiart_Id_Gen;
Commit work;
Set term ^; 
Create trigger 
   Alta_tiart For tipos_articulo
   Active Before Insert
   as 
       Begin
       If (New.tiart_Id Is null) Then
          New.tiart_Id = Gen_id(tiart_Id_Gen,1);
       End ;
^
Commit work^
Create Procedure tiart_Key_Gen 
   Returns( Avalue Integer)
      As
         Begin
         aValue = Gen_id(tiart_Id_Gen,1);
         End
^
set term ; ^
Grant all on tipos_articulo To Public;
Grant Execute on Procedure tiart_Key_Gen  To Public;

/**************************************************************************/
/******************************articulos******************************/
Create Table articulos(artic_Id Tid Constraint artic_Id_NN Not Null
                                    Constraint artic_key Primary Key,
                       artic_nombre tsNombreLP
                                    Constraint artic_nombre_NN Not Null, 
                       tiart_id tid
                                    Constraint artic_tiart_id_NN Not Null
                                    Constraint artic_lnk_tiar_id
                                        References Tipos_articulo(tiart_id)
                                            on Delete Cascade
                                            on update Cascade);
Create Generator artic_Id_Gen;
Commit work;
Set term ^; 
Create trigger 
   Alta_artic For articulos
   Active Before Insert
   as 
       Begin
       If (New.artic_Id Is null) Then
          New.artic_Id = Gen_id(artic_Id_Gen,1);
       End ;
^
Commit work^
Create Procedure artic_Key_Gen 
   Returns( Avalue Integer)
      As
         Begin
         aValue = Gen_id(artic_Id_Gen,1);
         End
^
set term ; ^
Grant all on articulos To Public;
Grant Execute on Procedure artic_Key_Gen  To Public;


/******************************************************************************/
/******************************edificios******************************/
Create Table edificios(edifi_Id Tid Constraint edifi_Id_NN Not Null
                                    Constraint edifi_key Primary Key,
                       edifi_nombre tsNombre
                                    Constraint edifi_nombre_NN Not Null);

Create Generator edifi_Id_Gen;
Commit work;
Set term ^; 
Create trigger 
   Alta_edifi For edificios
   Active Before Insert
   as 
       Begin
       If (New.edifi_Id Is null) Then
          New.edifi_Id = Gen_id(edifi_Id_Gen,1);
       End ;
^
Commit work^
Create Procedure edifi_Key_Gen 
   Returns( Avalue Integer)
      As
         Begin
         aValue = Gen_id(edifi_Id_Gen,1);
         End
^
set term ; ^
Grant all on edificios To Public;
Grant Execute on Procedure edifi_Key_Gen  To Public;
/******************************************************************************/
/******************************pisos******************************/
Create Table pisos(piso_Id Tid Constraint piso_Id_NN Not Null
                               Constraint piso_key Primary Key,
                   edifi_id tid
                               Constraint piso_edifi_id_NN Not Null
                               Constraint piso_lnk_edifi_id
                   References edificios
                       on Delete Cascade
                       on Update Cascade, 
                   piso_nombre tsNombre
                               Constraint piso_nombre_NN Not Null);
Create Generator piso_Id_Gen;
Commit work;
Set term ^; 
Create trigger 
   Alta_piso For pisos
   Active Before Insert
   as 
       Begin
       If (New.piso_Id Is null) Then
          New.piso_Id = Gen_id(piso_Id_Gen,1);
       End ;
^
Commit work^
Create Procedure piso_Key_Gen 
   Returns( Avalue Integer)
      As
         Begin
         aValue = Gen_id(piso_Id_Gen,1);
         End
^
set term ; ^
Grant all on pisos To Public;
Grant Execute on Procedure piso_Key_Gen  To Public;
/******************************************************************************/


/******************************inventario******************************/
Create Table inventario(inven_Id Tid Constraint inven_Id_NN Not Null
                                     Constraint inven_key Primary Key,
                        artic_id tId
                                     Constraint inven_artic_id_NN Not Null
                                     Constraint inven_lnk_artic_id
                                        References articulos
                                            on Delete Cascade
                                            on Update Cascade, 
                        inven_descripcion tsNombreXL,  
                        inven_caracteristica tsNombreL, 
                        inven_color tId
                                     Constraint inven_color_lnk_varia_id
                                        References variables(varia_id)
                                            on Delete Cascade
                                            on Update Cascade, 
                        inven_material tId
                                     Constraint inven_material_lnk_varia_id
                                        References variables(varia_id)
                                            on Delete Cascade
                                            on Update Cascade, 
                        inven_marca tId
                                     Constraint inven_lnk_varia_id
                                        References variables(varia_id)
                                            on Delete Cascade
                                            on Update Cascade, 
                        inven_modelo tsNombre, 
                        inven_numero_serie tsNombre,
                        inven_numero_inventario tsNombre
                                     Constraint i_n_inventario_NN Not Null,
                        inven_colocacion tid
                                     Constraint i_colocacion_lnk_varia_id
                                        References variables(varia_id)
                                            on Delete Cascade
                                            on Update Cascade, 
                        inven_observaciones tsNombreXL, 
                        inven_estado tId
                                     Constraint inven_estado_lnk_varia_id
                                        References variables(varia_id)
                                            on Delete Cascade
                                            on Update Cascade, 
                        inven_piso_id tId
                                     Constraint inven_piso_lnk_piso_id
                                        References pisos
                                            on Delete Cascade
                                            on Update Cascade, 
                        inven_emple_id tId
                                     Constraint inven_lnk_emple_id
                                        References empleados
                                            on Delete Cascade
                                            on Update Cascade, 
                        inven_alta date,                         
                        inven_actualizacion date);
Create Generator inven_Id_Gen;
Commit work;
Set term ^; 
Create trigger 
   Alta_inven For inventario
   Active Before Insert
   as 
       Begin
       If (New.inven_Id Is null) Then
          New.inven_Id = Gen_id(inven_Id_Gen,1);
       End ;
^
Commit work^
Create Procedure inven_Key_Gen 
   Returns( Avalue Integer)
      As
         Begin
         aValue = Gen_id(inven_Id_Gen,1);
         End
^
set term ; ^
Grant all on inventario To Public;
Grant Execute on Procedure inven_Key_Gen  To Public;
