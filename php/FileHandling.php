<?php
class FileHandling {
    private $filePath;

    public function __construct($filePath) {
        $this->filePath = $filePath;
    }

    public function readContent() {
        if (file_exists($this->filePath)) {
            return file_get_contents($this->filePath);
        } else {
            return "File not found.";
        }
    }

    //CONTENT EDITTING
    public function editContent($newContent) {
        if (file_exists($this->filePath)) {
            $result = file_put_contents($this->filePath, $newContent);
            if ($result !== false) {
                return "File content updated successfully.";
            } else {
                return "Error updating file content.";
            }
        } else {
            return "File not found.";
        }
    }

    public function editLineByIndex($lineNumber, $newContent) {
        if (file_exists($this->filePath)) {
            $lines = file($this->filePath);
            if (isset($lines[$lineNumber])) {
                $lines[$lineNumber] = $newContent . "\n"; // Add newline for consistency
                $result = file_put_contents($this->filePath, implode("", $lines));
                if ($result !== false) {
                    return "Line at index $lineNumber updated successfully.";
                } else {
                    return "Error updating line at index $lineNumber.";
                }
            } else {
                return "Invalid line number.";
            }
        } else {
            return "File not found.";
        }
    }

    //CONTENT SEARCHING
    public function searchContent($searchTerm) {
        $lines = file($this->filePath);
        $foundLines = [];
        foreach ($lines as $line) {
            if (strpos($line, $searchTerm) !== false) {
                $foundLines[] = trim($line);
            }
        }
        if (count($foundLines) > 0) {
            return $foundLines;
        } else {
            return "Search term not found in the file.";
        }
    }

    //CONTENT DISPLAY
    public function displayContent() {
        if (file_exists($this->filePath)) {
            echo $this->readContent();
        } else {
            echo "File not found.";
        }
    }

    public function displayLineByIndex($index) {
        if (file_exists($this->filePath)) {
            $lines = file($this->filePath);
            if (isset($lines[$index])) {
                echo trim($lines[$index]);
            } else {
                echo "Invalid index.";
            }
        } else {
            echo "File not found.";
        }
    }

    public function getLineFromFile($lineNumber) {
        if (file_exists($this->filePath)) {
            $lines = file($this->filePath);
            if (isset($lines[$lineNumber])) {
                return trim($lines[$lineNumber]);
            } else {
                return "Invalid line number.";
            }
        } else {
            return "File not found.";
        }
    }

    //GETTER
    public function getFilePath() {
        return $this->filePath;
    }

    //CONTENT ADDING
    public function addNewContent($newContent) {
        $sanitizedInput = htmlspecialchars($newContent, ENT_QUOTES, 'UTF-8'); //Sanitize input

        if (file_exists($this->filePath)) {
            $result = file_put_contents($this->filePath, $sanitizedInput . PHP_EOL, FILE_APPEND);
            if ($result !== false) {
                return "Text added successfully.";
            } else {
                return "Error adding text to file.";
            }
    }
}
        //DELETE CONTENT
        public function deleteLineByIndex($index) {
            if (file_exists($this->filePath)) {
                $lines = file($this->filePath);
                if (isset($lines[$index])) {
                    unset($lines[$index]); // Remove the line at the specified index
                    $lines = array_values($lines); // Re-index the array after removing the element
    
                    $result = file_put_contents($this->filePath, implode("", $lines));
                    if ($result !== false) {
                        return "Line at index $index deleted successfully.";
                    } else {
                        return "Error deleting line at index $index.";
                    }
                } else {
                    return "Invalid index.";
                }
            } else {
                return "File not found.";
            }
        }
    
}
?>