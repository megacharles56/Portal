/******************************days_a_year******************************/
Create Table days_a_year(dayea_Id Tid Constraint dayea_Id_NN Not Null
                                      Constraint dayea_key Primary Key,
                         dayea_year integer
                                      Constraint dayea_year_NN Not Null, 
                         dayea_days integer
                                      Constraint dayea_days_NN Not Null);
 
Create Generator dayea_Id_Gen;
Commit work;

Set term ^; 
Create trigger 
   Alta_dayea For days_a_year
   Active Before Insert
   as 
       Begin
       If (New.dayea_Id Is null) Then
          New.dayea_Id = Gen_id(dayea_Id_Gen,1);

       End ;
^
Commit work^
Create Procedure dayea_Key_Gen 
   Returns( Avalue Integer)
      As
         Begin
         aValue = Gen_id(dayea_Id_Gen,1);
         End
^

set term ; ^

Grant all on days_a_year To Public;
Grant Execute on Procedure dayea_Key_Gen  To Public;


