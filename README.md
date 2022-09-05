# Buto-Plugin-PhpDns_get_record
- Get dns records. 
- One table for each record.

## Widget get

```
type: widget
data:
  plugin: php/dns_get_record
  method: get
  data:
```
- Hostname is optional.
- If not set widget check for request param hostname or take current hostname.

```
    hostname: 'telia.se' 
```
