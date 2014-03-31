php-mappers-benchmarks
======================

[![Build Status](https://travis-ci.org/idr0id/php-mappers-benchmarks.png)](https://travis-ci.org/idr0id/php-mappers-benchmarks)

Tested with unstable dev-master versions.

[**Latest benchmarks**](https://travis-ci.org/idr0id/php-mappers-benchmarks)

```
php bin/console benchmap -s 1
Runtime: PHP5.5.9
Host: Linux testing-worker-linux-9-1-24467-linux-3-21933741 2.6.32-042stab079.5 #1 SMP Fri Aug 2 17:16:15 MSK 2013 x86_64
Collection size: 1
+------------------------+---------------+---------+
| package                | duration (MS) | MEM (B) |
+------------------------+---------------+---------+
| bcc/auto-mapper-bundle | 6             | 3670016 |
| native php             | 0             | 3670016 |
| idr0id/papper          | 8             | 4194304 |
| nylle/php-automapper   | 0             | 4194304 |
+------------------------+---------------+---------+
```

```
php bin/console benchmap -s 100000
Runtime: PHP5.5.9
Host: Linux testing-worker-linux-9-1-24467-linux-3-21933741 2.6.32-042stab079.5 #1 SMP Fri Aug 2 17:16:15 MSK 2013 x86_64
Collection size: 100000
+------------------------+---------------+----------+
| package                | duration (MS) | MEM (B)  |
+------------------------+---------------+----------+
| bcc/auto-mapper-bundle | 78906         | 70254592 |
| native php             | 803           | 70254592 |
| idr0id/papper          | 6014          | 71303168 |
| nylle/php-automapper   | 20532         | 72351744 |
+------------------------+---------------+----------+
```
