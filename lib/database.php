<?php 
class SQLserver
{
    public $conn;
    function __construct()
    {
        $config = json_decode(file_get_contents("../package.json"))->sql_config;
        $servername = $config->servername;
        $username = $config->username;
        $password = $config->password;
        $database = $config->database;
        $this->conn = new mysqli($servername, $username, $password, $database);
        
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
    function HTMLTableCategory()
    {
        $selectAll = 'SELECT Categories.Category_id,Categories.Name,Categories.Description FROM Categories';
        $result = $this->conn->query($selectAll);
        $tableBody = '';

        if ($result->num_rows >0){
            while ($row = $result->fetch_assoc()){
                $tableBody .="<tr>
                <td>".$row['Name']."</td>
                <td>".$row['Description']."</td>
                <td>
                <form action='../views/editCategory.php'>
                    <input type='hidden' name='id' value='" . $row["Category_id"] . "' />
                    <input type='hidden' name='Name' value='" . $row["Name"] . "' />
                    <input type='hidden' name='Description' value='" . $row["Description"] . "' />
                    <input type='submit' style='width:100%;' value='Редагувати'>
                </form>
                <form action='../controllers/deleteCategoryController.php'>
                    <input type='hidden' name='id' value='" . $row["Category_id"] . "' />
                    <input type='submit' style='width:100%;' value='Видалити'>
                </form>
            </td>
            </tr>";
            }
        }
        return $tableBody;
    }
    function HTMLTableTransactions(){
        $selectAll = 'SELECT T.Transaction_id,C.Category_id,C.Name,TT.Type,T.Amount,T.Transaction_date,T.Description FROM Transactions AS T 
        JOIN Categories AS C ON C.Category_id = T.Category_id 
        JOIN Transaction_Types AS TT ON TT.Type_id = T.Type_id';
        
        $result = $this->conn->query($selectAll);
        $tableBody = '';

        if ($result->num_rows >0){
            while ($row = $result->fetch_assoc()){
                $tableBody .="<tr>
                <td>".$row['Name']."</td>
                <td>".$row['Type']."</td>
                <td>".$row['Amount']."</td>
                <td>".$row['Transaction_date']."</td>
                <td>".$row['Description']."</td>
                <td>
                <form action='../views/editTransaction.php'>
                    <input type='hidden' name='Category_id' value='" . $row["Category_id"] . "' />
                    <input type='hidden' name='Type_id' value='" . $row["Type"] . "' />
                    <input type='hidden' name='Amount' value='" . $row["Amount"] . "' />
                    <input type='hidden' name='Transaction_date' value='" . $row["Transaction_date"] . "' />
                    <input type='hidden' name='Description' value='" . $row["Description"] . "' />
                    <input type='hidden' name='Transaction_id' value='".$row["Transaction_id"]."' />
                    <input type='submit' style='width:100%;' value='Редагування'>
                </form>
                <form action='../controllers/deleteTransactionController.php'>
                    <input type='hidden' name='id' value='" . $row["Transaction_id"] . "' />
                    <input type='submit' style='width:100%;' value='Видалення'>
                </form>
            </td>
            </tr>";
            }
        }
        return $tableBody;
    }
    function HTMLCategoryOptions()
    {
        $selectAllCategories = 'SELECT c.category_id,c.name  FROM categories as c';

        $result = $this->conn->query($selectAllCategories);
        $category_options = "";
        if ($result->num_rows >0){
            while ($row = $result->fetch_assoc()){
                $category_options.="<option value='".$row['category_id']."'>".$row['name']."</option>";
            }
        }
        return $category_options;
    }
    function HTMLTypesOptions(){
        $selectAllTypes = 'SELECT t.type_id,t.type  FROM Transaction_types as t';

        $result = $this->conn->query($selectAllTypes);
        $category_options = "";
        if ($result->num_rows >0){
            while ($row = $result->fetch_assoc()){
                $category_options.="<option value='".$row['type_id']."'>".$row['type']."</option>";
            }
        }
        return $category_options;
    }
    function HTMLGenerateReport($Transaction_date_from,$Transaction_date_to,$Type_id){
        $query = "SELECT C.Name,SUM(T.AMOUNT) AS 'SUM' FROM TRANSACTIONS AS T 
        JOIN CATEGORIES AS C ON C.CATEGORY_ID = T.CATEGORY_ID
        WHERE T.TRANSACTION_DATE BETWEEN '$Transaction_date_from' AND '$Transaction_date_to'
        AND T.Type_id = ".$Type_id."
        GROUP BY C.NAME";
        $tableBody = '';
        $result = $this->conn->query($query);
        if ($result->num_rows >0){
            while ($row = $result->fetch_assoc()){
                $tableBody .="<tr>
                <td class = 'ReportCategory'>".$row['Name']."</td>
                <td class = 'ReportSum'>".$row['SUM']."</td>
            </tr>";
            }
        }
        return $tableBody;
    }
}
$conn = (new SQLserver())->conn;
?>