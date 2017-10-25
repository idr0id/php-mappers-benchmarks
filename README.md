php-mappers-benchmarks
======================

[![Build Status](https://travis-ci.org/idr0id/php-mappers-benchmarks.png)](https://travis-ci.org/idr0id/php-mappers-benchmarks)

Tested with unstable dev-master versions.

[**Latest benchmarks**](https://travis-ci.org/idr0id/php-mappers-benchmarks)

```
$ php bin/console benchmap -s 1
Runtime: PHP 7.1.10
Host: Linux testing-gce-5eeb0a22-ea3a-4877-b3b1-9302ff18b35a 4.4.0-93-generic #116~14.04.1-Ubuntu SMP Mon Aug 14 16:07:05 UTC 2017 x86_64
Collection size: 1
+-------------------------------+---------------+---------+
| package                       | duration (MS) | MEM (B) |
+-------------------------------+---------------+---------+
| nylle/php-automapper          | 0             | 4194304 |
| mark-gerarts/auto-mapper-plus | 0             | 6291456 |
| native php                    | 0             | 6291456 |
| trismegiste/alkahest          | 1             | 6291456 |
| idr0id/papper                 | 3             | 4194304 |
| bcc/auto-mapper-bundle        | 3             | 6291456 |
+-------------------------------+---------------+---------+
The command "php bin/console benchmap -s 1" exited with 0.
0.12s

$ php bin/console benchmap -s 10
Runtime: PHP 7.1.10
Host: Linux testing-gce-5eeb0a22-ea3a-4877-b3b1-9302ff18b35a 4.4.0-93-generic #116~14.04.1-Ubuntu SMP Mon Aug 14 16:07:05 UTC 2017 x86_64
Collection size: 10
+-------------------------------+---------------+---------+
| package                       | duration (MS) | MEM (B) |
+-------------------------------+---------------+---------+
| native php                    | 0             | 6291456 |
| nylle/php-automapper          | 1             | 4194304 |
| mark-gerarts/auto-mapper-plus | 2             | 6291456 |
| trismegiste/alkahest          | 2             | 6291456 |
| idr0id/papper                 | 3             | 4194304 |
| bcc/auto-mapper-bundle        | 6             | 6291456 |
+-------------------------------+---------------+---------+
The command "php bin/console benchmap -s 10" exited with 0.
0.18s

$ php bin/console benchmap -s 100
Runtime: PHP 7.1.10
Host: Linux testing-gce-5eeb0a22-ea3a-4877-b3b1-9302ff18b35a 4.4.0-93-generic #116~14.04.1-Ubuntu SMP Mon Aug 14 16:07:05 UTC 2017 x86_64
Collection size: 100
+-------------------------------+---------------+---------+
| package                       | duration (MS) | MEM (B) |
+-------------------------------+---------------+---------+
| native php                    | 0             | 6291456 |
| idr0id/papper                 | 5             | 4194304 |
| nylle/php-automapper          | 7             | 4194304 |
| trismegiste/alkahest          | 9             | 6291456 |
| mark-gerarts/auto-mapper-plus | 17            | 6291456 |
| bcc/auto-mapper-bundle        | 37            | 6291456 |
+-------------------------------+---------------+---------+
The command "php bin/console benchmap -s 100" exited with 0.
0.79s

$ php bin/console benchmap -s 1000
Runtime: PHP 7.1.10
Host: Linux testing-gce-5eeb0a22-ea3a-4877-b3b1-9302ff18b35a 4.4.0-93-generic #116~14.04.1-Ubuntu SMP Mon Aug 14 16:07:05 UTC 2017 x86_64
Collection size: 1000
+-------------------------------+---------------+---------+
| package                       | duration (MS) | MEM (B) |
+-------------------------------+---------------+---------+
| native php                    | 2             | 6291456 |
| idr0id/papper                 | 29            | 4194304 |
| nylle/php-automapper          | 74            | 4194304 |
| trismegiste/alkahest          | 83            | 6291456 |
| mark-gerarts/auto-mapper-plus | 167           | 6291456 |
| bcc/auto-mapper-bundle        | 334           | 6291456 |
+-------------------------------+---------------+---------+
The command "php bin/console benchmap -s 1000" exited with 0.
6.99s

$ php bin/console benchmap -s 10000
Runtime: PHP 7.1.10
Host: Linux testing-gce-5eeb0a22-ea3a-4877-b3b1-9302ff18b35a 4.4.0-93-generic #116~14.04.1-Ubuntu SMP Mon Aug 14 16:07:05 UTC 2017 x86_64
Collection size: 10000
+-------------------------------+---------------+----------+
| package                       | duration (MS) | MEM (B)  |
+-------------------------------+---------------+----------+
| native php                    | 28            | 18874368 |
| idr0id/papper                 | 307           | 8388608  |
| nylle/php-automapper          | 749           | 8388608  |
| trismegiste/alkahest          | 804           | 18874368 |
| mark-gerarts/auto-mapper-plus | 1670          | 8388608  |
| bcc/auto-mapper-bundle        | 3308          | 8388608  |
+-------------------------------+---------------+----------+
The command "php bin/console benchmap -s 10000" exited with 0.
67.59s

$ php bin/console benchmap -s 100000
Runtime: PHP 7.1.10
Host: Linux testing-gce-5eeb0a22-ea3a-4877-b3b1-9302ff18b35a 4.4.0-93-generic #116~14.04.1-Ubuntu SMP Mon Aug 14 16:07:05 UTC 2017 x86_64
Collection size: 100000
+-------------------------------+---------------+-----------+
| package                       | duration (MS) | MEM (B)   |
+-------------------------------+---------------+-----------+
| native php                    | 289           | 125833216 |
| idr0id/papper                 | 2650          | 35655680  |
| nylle/php-automapper          | 7271          | 35655680  |
| trismegiste/alkahest          | 7906          | 125833216 |
| mark-gerarts/auto-mapper-plus | 16717         | 35655680  |
| bcc/auto-mapper-bundle        | 32481         | 35655680  |
+-------------------------------+---------------+-----------+
```
