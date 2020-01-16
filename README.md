## iPrice Assessment

- Laravel 6.11.0 was used to complete this assessment.

### Requirement for Laravel 6

```markdown
Composer
PHP >= 7.2.0
BCMath PHP Extension
Ctype PHP Extension
JSON PHP Extension
Mbstring PHP Extension
OpenSSL PHP Extension
PDO PHP Extension
Tokenizer PHP Extension
XML PHP Extension
```

### List Of Folder Involved

```markdown
app/Utilities
app/Console/Commands
```

### How To Setup

- Install all the package.

```markdown
composer install
```

- Execute the command. The main file is `/app/Console/Commands/TransformWord.php`.

```markdown
php artisan transform:word 
```

- You will be ask to enter some string. Put `hello world`

```markdown
 Please enter some string?:
 > hello world
```

### Output

```markdown
HELLO WORLD
hElLo wOrLd
CSV Created!
```

### Check the CSV file created in the root folder. The file name is 'hello-world.csv'.

```markdown
Content of CSV file.
h,e,l,l,o, ,w,o,r,l,d
```

### Run the test

```markdown
vendor/bin/phpunit --testdox -v
```

- All test file located in `tests` folder. 
- `Command` folder contains test files related to CLI command
- `Unit` folder contains test files related to Utilities.

### Test Output

```markdown
Csv Adapter
 ✔ It should create a new csv file  53 ms
 ✔ It should write correct content into csv file  11 ms

File Output
 ✔ It should create a new file  10 ms
 ✔ It should write correct content  10 ms

String Util
 ✔ It should transform the word to uppercase  10 ms
 ✔ It should transform the word to alternate lowercase and uppercase  10 ms
 ✔ It should transform the word with comma after every character  10 ms

Transform Word
 ✔ It should only accept string for the input  40 ms
 ✔ It should transform the input to uppercase  18 ms
 ✔ It should transform the input to alternate lowercase and uppercase  17 ms
 ✔ It should write csv created to stdout when success  18 ms
 ✔ It should write each character as column in csv file  17 ms
 ✔ Csv file name should be based on the input combine separated with hypen  18 ms
 ✔ It should write the csv file in root project folder  17 ms

```