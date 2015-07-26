php-mappers-benchmarks
======================

[![Build Status](https://travis-ci.org/idr0id/php-mappers-benchmarks.png)](https://travis-ci.org/idr0id/php-mappers-benchmarks)

Tested with unstable dev-master versions.

[**Latest benchmarks**](https://travis-ci.org/idr0id/php-mappers-benchmarks)

```
$ php bin/console benchmap -s 1
Runtime: PHP 5.5.9
Host: Linux testing-worker-linux-2-2-14051-linux-10-21957041 2.6.32-042stab079.5 #1 SMP Fri Aug 2 17:16:15 MSK 2013 x86_64
Collection size: 1
+------------------------+---------------+---------+
| package                | duration (MS) | MEM (B) |
+------------------------+---------------+---------+
| native php             | 0             | 3407872 |
| nylle/php-automapper   | 0             | 3407872 |
| bcc/auto-mapper-bundle | 4             | 3670016 |
| idr0id/papper          | 8             | 4194304 |
+------------------------+---------------+---------+
```

```
$ php bin/console benchmap -s 100000
Runtime: PHP 5.5.9
Host: Linux testing-worker-linux-2-2-14051-linux-10-21957041 2.6.32-042stab079.5 #1 SMP Fri Aug 2 17:16:15 MSK 2013 x86_64
Collection size: 100000
+------------------------+---------------+----------+
| package                | duration (MS) | MEM (B)  |
+------------------------+---------------+----------+
| native php             | 704           | 66060288 |
| idr0id/papper          | 5033          | 72089600 |
| nylle/php-automapper   | 17919         | 70778880 |
| bcc/auto-mapper-bundle | 68714         | 71827456 |
+------------------------+---------------+----------+
```
