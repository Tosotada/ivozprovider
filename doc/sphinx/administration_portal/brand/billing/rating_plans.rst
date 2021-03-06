#############
Rating plans
#############

Rating plans describe how calls are rated for different destinations at different times of the day.

**********************
Rating plan definition
**********************

:ref:`Destination rates` are grouped using Rating plans. This offers the possibility to have base pricing data and customize
some destinations with different prices at different times of the day.

This are the fields that define a Rating plan:

.. glossary::

    Name
        Name that will be use to reference this rating plan.

    Description
        A field to enter additional information. Not used anywhere.

.. tip:: Rating plan names appear on final clients' invoices, choose something with commercial sense.

***************************************
Adding Destination rates to Rating Plan
***************************************

Rating plans group several :ref:`destination rates` to allow flexible configuration that rate destinations differently
at different times of the day (**List of destination rates** subsection).

.. glossary::

    Destination rate
        Adds selected destination rate to rating plan

    Weight
        If a given call can be billed with more than one destination rate within the rating plan,
        it will be billed using the one with highest weight.

    Timing type
        Should this association apply always or just at given times of the week?

.. tip:: Weight allows having a general *Destination rate* and concrete the price of
         an specific destination in another *destination rate* with higher weight (free cell
         phone calls, for example).

.. warning:: A rating plan MUST be capable of rating calls 24x7. Adding the timings of all destination rates in a rating
           plan MUST cover every moment of the week.

.. rubric:: Checking Rating plans

To check the configuration so far we can **Simulate a call** from the rating plans list.

We introduce the destination number in :ref:`E.164 format <e164>`, and we can check the price every rating plan on the
list will charge for that call.

*********************************
Assigning rating plans to clients
*********************************

An specific **rating plan** can be linked to multiple clients.

In the section **Brand configuration** > **Virtual PBXs** (**Residential**, **Retail** and **Wholesale**) we select
**List of Rating Plans** subsection.

.. note:: Every **Rating plan** has an activation time and only one can be active for each
          client at an specific moment (the one whose activation time is nearer in the past).

.. rubric:: Simulating a call of a specific client

In this list we can also simulate a call for a given client like we did previously
in the rating plan list and check the price it will imply. This way, we can be sure
that the configuration is ok.
