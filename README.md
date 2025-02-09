# Описание задачи

Есть набор сайтов на php, которые расположены все на одном сервере, в разных каталогах. Обслуживаются через nginx, который стоит на том же хосте.

Для сайтов настроено локальное обращение к phpfpm через сокет.

После очередного обновления php, которое поломало часть сайтов, для более гибкого управления и более удобной разработки было решено разделить среды всех сайтов.

В результате разработчикам для локальных тестов собрали условный docker-compose

Так же в процессе миграции в публичное облако решено было перенести все приложения под управление в кластер kubernetes. И так как облако публичное и публичные адреса открыты всему миру необходимо закрыть непроизводственные среды от досупа пользователей/ботов.

## Итого

Развернуть сайт в kubernetes, чтобы он был доступен только разработчикам в облаке.

Облако может быть использовано любое из публичных. Например:

- Yandex.Cloud
- AWS
- Azure
- Digial Ocean
- GCP
- Hetzner Cloud

## Задачи

1. Упаковать сайт в контейер(ы) (если нужно)

2. Развернуть инфраструкуру для kubernetes при помощи terraform в публичном облаке

3. Развернуть кластер k8s: мастер и нода на разных серверах (скрипт/перечень шагов и команд для выполнения/terraform - не важно, как удобно)

4. Создать описание(deployment) сайта в k8s

5. Настроить базовую авторизацию для доступа к сайту

6. Задокументировать установку и разворачивание сайта (краткая инструкция)

7. Решение с документацией выложено на GutHub, при разворачивании по приложенной инструкции сайт работает, доступен

## Вопросы по задаче

1. Что делать со статикой сайта (картинки, css, js и прочее)?

2. Как/чем мониторить доступность и работу сервиса, кластера k8s?

3. Как/чем собирать логи?

4. Сколько ресурсов нужно будет сайту?

5. Если потребуется база данных - что делать?

6. Сайтов много, приложений(микросервисов) еще больше. Каждый сервис/приложение отдельно описывать?

7. Как обновлять?

### Tips

Чтобы не думать о DNS именах для доступа извне удобно использовать сервис http://xip.io/, чтобы резолвить имена my.ip.v4.address.xip.io в IP адрес (10.0.0.1.xip.io resolves to 10.0.0.1)

Образы bitnami в docker-compose не принципиальны и в данном случае использованы просто для примера, можно использовать любые другие при желании.

## Вопросы для обсуждения

- кубернетес или docker swarm?
- почему?
- плоская сеть или все изолировано (много своих сетей)?
- где держать документацию?
- как поддерживать актуальное состояние документации?
- что еще кроме nginx/apache?
- в чем отличие Continuous Delivery и Continuous Deployment
- какие бывают основные типы/паттерны деплоймента(разворачивания)?
- managed решения (например базы данных) или самим разворачивать?
- letsencrypt или свои(платные) SSL сертификаты?
- как относится к идее Infrastructure as Code?
- как относится к идее Immutable Infrastructure?
- Zabbix или Prometheus? Почему?
- если использовать концепцию Immutable Infrastructure, то где/как хранить стейт и данные?
- как/где хранить секреты?
- есть знакомство с api management/api gateway решениями (wso2/apigee/kong/etc)?
- управление пользователями, правами и доступами
- изпользование публичного облака в организации, какие могут быть KPI?
- хранение данных в stateless среде/сервисах
