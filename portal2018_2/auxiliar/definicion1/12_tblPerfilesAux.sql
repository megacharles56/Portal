/******************************perpu_forma******************************/
Create Table perpu_formacion(pForm_Id Tid Constraint pForm_Id_NN Not Null
                                      Constraint pForm_key Primary Key,
                            autor tid 
                                    Constraint autor_pForm_NN Not Null
                                    Constraint pForm_lnk_Perso
                                            References Personas(Perso_ID) 
                                                    on Delete Cascade
                                                    on Update Cascade,
                            Modificacion  timestamp,  
                            perpu_id tid
                                      Constraint pForm_perpu_id_NN Not Null
                                      Constraint pForm_lnk_perpu_id
                                          References PErfiles_puesto(Perpu_id)  
                                          on Delete Cascade
                                          on Update Cascade, 
                                      pForm_Curso tsnombreXXL
                                      Constraint pForm_Curso_NN Not Null);
 
Create Generator pForm_Id_Gen;

Commit work;

Set term ^; 
Create trigger 
   Alta_pForm For perpu_formacion
   Active Before Insert
   as 
       Begin
       If (New.pForm_Id Is null) Then
          New.pForm_Id = Gen_id(pForm_Id_Gen,1);
       If (New.modificacion Is null) Then   
          new.modificacion = current_timestamp; 
       End ;
^
Create trigger 
   Modif_pForm For perpu_formacion
   Active Before update
   As
      Begin
       If (New.modificacion Is null) Then   
         new.modificacion = current_timestamp; 
      End;
^
Commit work^
Create Procedure pForm_Key_Gen 
   Returns( Avalue Integer)
      As
         Begin
         aValue = Gen_id(pForm_Id_Gen,1);
         End
^
Commit work^

set term ; ^

Grant all on perpu_formacion To Public;
Grant Execute on Procedure pForm_Key_Gen  To Public;

/***************************************************************************/
/******************************perpu_Habilidad******************************/
Create Table perpu_Habilidad(pHabi_Id Tid Constraint pHabi_Id_NN Not Null
                                          Constraint pHabi_key Primary Key,
                            autor tid 
                                    Constraint autor_pHabi_NN Not Null
                                    Constraint pHabi_lnk_Perso
                                            References Personas(Perso_ID) 
                                                    on Delete Cascade
                                                    on Update Cascade,
                             modificacion  timestamp, 
                             perpu_id tid
                                          Constraint pHabi_perpu_id_NN Not Null
                                          Constraint pHabi_lnk_perpu
                                             References Perfiles_puesto
                                                  on Delete Cascade
                                                  on Update Cascade,
                             pHabi_Habilidad tsNombreXXL );
 
Create Generator pHabi_Id_Gen;
Commit work;

Set term ^; 
Create trigger 
   Alta_pHabi For perpu_Habilidad
   Active Before Insert
   as 
       Begin
       If (New.pHabi_Id Is null) Then
          New.pHabi_Id = Gen_id(pHabi_Id_Gen,1);
       If (New.modificacion Is null) Then   
          new.modificacion = current_timestamp; 
       End ;
^
Create trigger 
   Modif_pHabi For perpu_Habilidad
   Active Before update
   As
      Begin
       If (New.modificacion Is null) Then   
         new.modificacion = current_timestamp; 
      End;
^
Commit work^
Create Procedure pHabi_Key_Gen 
   Returns( Avalue Integer)
      As
         Begin
         aValue = Gen_id(pHabi_Id_Gen,1);
         End
^
Commit work^

set term ; ^

Grant all on perpu_Habilidad To Public;
Grant Execute on Procedure pHabi_Key_Gen  To Public;

/***************************************************************************/
/******************************Perpu_Funciones******************************/
Create Table Perpu_Funciones(PFunc_Id Tid Constraint PFunc_Id_NN Not Null
                                          Constraint PFunc_key Primary Key,
                            autor tid 
                                    Constraint autor_PFunc_NN Not Null
                                    Constraint PFunc_lnk_Perso
                                            References Personas(Perso_ID) 
                                                    on Delete Cascade
                                                    on Update Cascade,
                             modificacion  timestamp, 
                             Perpu_id tid
                                          Constraint PFunc_Perpu_id_NN Not Null
                                          Constraint PFunc_lnk_Perpu_id
                                          References Perfiles_puesto
                                             on Delete Cascade
                                             on Update Cascade,
                             PFunc_Funcion tsNombreXXL );
 
Create Generator PFunc_Id_Gen;
Commit work;

Set term ^; 
Create trigger 
   Alta_PFunc For Perpu_Funciones
   Active Before Insert
   as 
       Begin
       If (New.PFunc_Id Is null) Then
          New.PFunc_Id = Gen_id(PFunc_Id_Gen,1);
       If (New.modificacion Is null) Then   
          new.modificacion = current_timestamp; 
       End ;
^
Create trigger 
   Modif_PFunc For Perpu_Funciones
   Active Before update
   As
      Begin
       If (New.modificacion Is null) Then   
         new.modificacion = current_timestamp; 
      End;
^
Commit work^
Create Procedure PFunc_Key_Gen 
   Returns( Avalue Integer)
      As
         Begin
         aValue = Gen_id(PFunc_Id_Gen,1);
         End
^

Commit work^

set term ; ^

Grant all on Perpu_Funciones To Public;
Grant Execute on Procedure PFunc_Key_Gen  To Public;
/******************************pp_relaciones_ext******************************/
Create Table pp_relaciones_ext(pRelE_Id Tid Constraint pRelE_Id_NN Not Null
                                             Constraint pRelE_key Primary Key,
                               autor tid 
                                    Constraint autor_pRelE_NN Not Null
                                    Constraint pRelE_lnk_Perso
                                            References Personas(Perso_ID) 
                                                    on Delete Cascade
                                                    on Update Cascade,
                               modificacion  timestamp, 
                               perpu_id tid
                                             Constraint pRelE_perpu_id_NN Not Null
                                             Constraint pRelE_lnk_perpu_id
                                                References Perfiles_puesto
                                                  on Delete Cascade
                                                  on Update Cascade, 
                               pRelE_Relacion tsnombreXXL
                                             Constraint pRelE_Relecion_NN Not Null);
 
Create Generator pRelE_Id_Gen;
Commit work;

Set term ^; 
Create trigger 
   Alta_pRelE For pp_relaciones_ext
   Active Before Insert
   as 
       Begin
       If (New.pRelE_Id Is null) Then
          New.pRelE_Id = Gen_id(pRelE_Id_Gen,1);
       If (New.modificacion Is null) Then   
         new.modificacion = current_timestamp; 
       End ;
^
Create trigger 
   Modif_pRelE For pp_relaciones_ext
   Active Before update
   As
      Begin                                     
       If (New.modificacion Is null) Then   
         new.modificacion = current_timestamp; 
      End;
^
Commit work^
Create Procedure pRelE_Key_Gen 
   Returns( Avalue Integer)
      As
         Begin
         aValue = Gen_id(pRelE_Id_Gen,1);
         End
^
Commit work^

set term ; ^

Grant all on pp_relaciones_ext To Public;
Grant Execute on Procedure pRelE_Key_Gen  To Public;


