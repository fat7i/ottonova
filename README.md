## The Task
The fictional company Ottivo wants to determine each of its employee's yearly vacation days for a given year.

Requirements:
- Each employee has a minimum of 26 vacation days regardless of age
- A special contract can overwrite the amount of minimum vacation days
- Employees >= 30 years get one additional vacation day every 5 years
- Contracts can start on the 1st or the 15th of a month
- Contracts starting in the course of the year get 1/12 of the yearly vacation days for each full month

##### List of employees:
| Name        | Date of Birth           | Contract Start Date  | Special Contract  |
| ------------- |:-------------:| -----:|-----:|
| Hans Müller      | 30.12.1950 | 01.01.2001 | |
| Angelika Fringe      | 09.06.1966 | 15.01.2001 | |
| Peter Klever      | 12.07.1991 | 15.05.2016 | 27 vacation days |
| Marina Helter      | 26.01.1970 | 15.01.2018 | |
| Sepp Meier      | 23.05.1980 | 01.12.2017 | |

---
## About the solution
- App require a `"php": ">7.3.0"`.
- Data can be found in [data.php](data.php).
- PhpMetrics report can be found [myreport](myreport/index.html), and it can be regenerate by:
```
php vendor/bin/phpmetrics --report-html=myreport .

```

## Instructions
- Install packages:
```
composer install
```

- Run the app via:
```
php run.php <year>
```

---
#### TODO
- provide a PHPUnit tests.
- move some const to be read from a config file, with adding Config class.
- validate data and throw exceptions [like](src/Contract/Contract.php#L33).

#### Have a Query?
Mail me at [iam.ben.fathi@gmail.com](mailto:iam.ben.fathi@gmail.com)