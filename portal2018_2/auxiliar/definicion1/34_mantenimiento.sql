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
  MANTO_ID TID NOT NULL,
  MNTO_FOLIO_E TID,
  MNTO_FOLIO_S TID,
  MNTO_FOLIO_M TID,
  EMPL_ID TID,
  MNTO_FALLA TSNOMBREL,
  MNTO_OBSERVACIONES_U varchar(512),
  MNTO_FSOLICITUD date,
  MNTO_HSOLICITUD time,
  MNTO_RESPONSABLE TID,
  INVEN_ID TID 
  MNTO_F_INICIO date,
  MNTO_H_INICIO time,
  MNTO_DIAGNOSTICO TSNOMBREL,
  MNTO_ACCIONES varchar(512),
  MNTO_OBSERVACIONES_M varchar(512),
  MNTO_F_ENTREGA date,
  MNTO_H_ENTREGA time,
  MNTO_F_RECEPCION date,
  MNTO_H_RECEPCION time,
  MNTO_CALIFICACION TID,
  MNTO_ESTADO TID,
  DEPT_ID TID,
  MNTO_TIPO_MNTO TSNOMBREL,
  MNTO_FECHA_PREFERENTE TSNOMBREL,
  MNTO_HORA_PREFERENTE TSNOMBREL,
  CONSTRAINT MNTO_KEY PRIMARY KEY (MNTO_ID)

*/


/******************************mantenimiento******************************/
Create Table mantenimiento(manto_Id Tid 
                                Constraint manto_Id_NN Not Null
                                Constraint manto_key Primary Key,
                            manto_folio_s integer, 
                            manto_folio_m integer, 
                            manto_folio_e integer, 
                            autor tid 
                                Constraint autor_manto_NN Not Null
                                Constraint manto_lnk_Perso
                                        References Personas(Perso_ID) 
                                                on Delete Cascade
                                                on Update Cascade, 
                            modificacion timestamp,
                            manto_falla tsNombreL
                                Constraint manto_falla_NN Not Null, 
                            manto_observaciones tsNombre1X, 
                            manto_f_solicitud date
                                Constraint manto_f_solicitud_NN Not Null, 
                            manto_h_solicitud time
                                Constraint manto_h_solicitud_NN Not Null, 
                            manto_responsable tId
                                Constraint manto_lnk_emple_id
                                    References empleados
                                        on Delete Cascade
                                        on Update Cascade, 
                            manto_inven_id tId
                                Constraint manto_lnk_inven_id
                                    References inventario
                                        on Delete Cascade
                                        on Update Cascade, 
                            manto_f_inicio date, 
                            manto_h_inicio time, 
                            manto_diagnostico tsNombreL, 
                            manto_acciones tsNombre1X, 
                            manto_observaciones_m tsNombre1X, 
                            manto_f_entrega date, 
                            manto_h_entrega time, 
                            manto_f_recepcion date, 
                            manto_h_recepcion time, 
                            manto_califiacion tid
                                Constraint manto_lnk_varia_id
                                    References variables
                                        on Delete Cascade
                                        on Update Cascade, 
                           manto_estado tid
                                Constraint manto_estado_NN Not Null
                                Constraint manto_estado_lnk_varia_id
                                    References variables
                                        on Delete Cascade
                                        on Update Cascade, 
                           manto_tipo_Manto tid
                                Constraint manto_tipo_lnk_varia_id
                                    References Variables
                                        on Delete Cascade
                                        on Update Cascade, 
                           manto_f_preferente tsnombrel,
                           manto_h_preferente tsnombrel);
 
Create Generator manto_Id_Gen;
Commit work;

Create Generator manto_folio_s_Gen;
Commit work;

Create Generator manto_folio_m_Gen;
Commit work;

Create Generator manto_folio_e_Id_Gen;
Commit work;

Set term ^; 
Create trigger 
   Alta_manto For mantenimiento
   Active Before Insert
   as 
       Begin
       If (New.manto_Id Is null) Then
          New.manto_Id = Gen_id(manto_Id_Gen,1);
       new.modificacion = current_timestamp; 
       End ;
^
Create trigger 
   Modif_manto For mantenimiento
   Active Before update
   As
      Begin
         new.modificacion = current_timestamp; 
      End;
^
Commit work^
Create Procedure manto_Key_Gen 
   Returns( Avalue Integer)
      As
         Begin
         aValue = Gen_id(manto_Id_Gen,1);
         End
^

set term ; ^

Grant all on mantenimiento To Public;
Grant Execute on Procedure manto_Key_Gen  To Public;


