<?php

class Form 
{ 
    private $fields = []; 
    private $action; 
    private $submit = "Submit"; 
  
    public function __construct($action, $submitText = "Submit") 
    { 
        $this->action = $action; 
        $this->submit = $submitText; 
    } 
  
    public function addField($name, $label) 
    { 
        $this->fields[] = [
            'name'  => $name,
            'label' => $label
        ];
    }
  
    public function display() 
    { 
        echo "<form action='{$this->action}' method='POST'>";
        echo "<table width='100%' border='0'>";

        foreach ($this->fields as $f) {
            echo "
            <tr>
                <td width='30%' align='right'>{$f['label']}</td>
                <td><input type='text' name='{$f['name']}'></td>
            </tr>";
        }

        echo "
        <tr>
            <td colspan='2'><input type='submit' value='{$this->submit}'></td>
        </tr>";

        echo "</table>";
        echo "</form>";
    }
} 
?>
