**Technical/implementation details**

**_Client server architecture_**

Vue app (browser) -> Nginx proxy -> PHP app (FPM) -> sqlite

From the source code, folders of interest are: src, docker, tests, ui

dump.sql can be found int the project root

src folder contains the php code ui contains the vue code docker contains the container
provisioning/setup files test contains unit tests files

**Src folder** is structured based on the hexagonal pattern (DDD / inversion of control): domain is the
core layer, after it sits application layer and after it is the presenation/infrastructure layer.
Domain should hold the models built from the ubiquitous language (it should not call any upper layer
API, with small exceptions like some generic API: an user input data validation API). Application
sits between presentation/infrastructure and Domain. It's a middle man between these layers
Presentation holds the controllers and query models Infarstructure holds integration APIs like
repositories or file system or external services etc. The last 2 layers are mostly tied to external
APIs/clients (browser, DB etc)

migrations folder has the Doctrine generated migrations files (based on the Domain models
annotations)

Unit test coverage is not that high. Some tests may be redundant and not high priority. The unit
tests have been written mostly to apply some basic unit testing concepts
(happy path, negative scenarios and some unit testing practices like side effects free). Some
attention could be directed towards functional type of testing, but I did not do much in this
direction for this project (all are important after all, depends on the app/business state and
requirements).

As a side note. I would not have this kind of use case since it could bring inconsistencies to the
data. Countries ISO data can be set as static/constant countries map where each country would have
its own details in an array. Allowing users to change data there without review might bring invalid
ISO data. Another alternative if DB needs to be used, are migration files + code review may be a
better approach (code review to see if country seed values correspond to ISO standard).
I had some issue on some project where improper code made some services had inconsistent
ISO locales (this could happen with country codes or calling codes if the data is not saved 
somehow in a static and peer reviewed manner)