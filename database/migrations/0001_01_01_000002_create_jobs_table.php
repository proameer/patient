<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeletionColumnsToHrTables extends Migration
{
    public function up()
    {
        Schema::table("HR_AuditDetails", function (Blueprint $table) {
            $table->boolean('IsDeleted')->default(false);
            $table->integer('DeleterId')->nullable();
            $table->timestampTz('DeletionTime')->nullable();
        });

        Schema::table("HR_AuditLogs", function (Blueprint $table) {
            $table->boolean('IsDeleted')->default(false);
            $table->integer('DeleterId')->nullable();
            $table->timestampTz('DeletionTime')->nullable();
        });

        Schema::table("HR_EmployeeAcademicRankPayRolls", function (Blueprint $table) {
            $table->boolean('IsDeleted')->default(false);
            $table->integer('DeleterId')->nullable();
            $table->timestampTz('DeletionTime')->nullable();
        });

        Schema::table("HR_EmployeeBankAccounts", function (Blueprint $table) {
            $table->boolean('IsDeleted')->default(false);
            $table->integer('DeleterId')->nullable();
            $table->timestampTz('DeletionTime')->nullable();
        });

        Schema::table("HR_EmployeeCertificatePayRoll", function (Blueprint $table) {
            $table->boolean('IsDeleted')->default(false);
            $table->integer('DeleterId')->nullable();
            $table->timestampTz('DeletionTime')->nullable();
        });

        Schema::table("HR_EmployeeClassificationPayRoll", function (Blueprint $table) {
            $table->boolean('IsDeleted')->default(false);
            $table->integer('DeleterId')->nullable();
            $table->timestampTz('DeletionTime')->nullable();
        });

        Schema::table("HR_EmployeeFamilyInfo", function (Blueprint $table) {
            $table->boolean('IsDeleted')->default(false);
            $table->integer('DeleterId')->nullable();
            $table->timestampTz('DeletionTime')->nullable();
        });

        Schema::table("HR_EmployeeFamilyInfoPayRoll", function (Blueprint $table) {
            $table->boolean('IsDeleted')->default(false);
            $table->integer('DeleterId')->nullable();
            $table->timestampTz('DeletionTime')->nullable();
        });

        Schema::table("HR_EmployeeIdentificationCards", function (Blueprint $table) {
            $table->boolean('IsDeleted')->default(false);
            $table->integer('DeleterId')->nullable();
            $table->timestampTz('DeletionTime')->nullable();
        });

        Schema::table("HR_EmployeeLeavesCredits", function (Blueprint $table) {
            $table->boolean('IsDeleted')->default(false);
            $table->integer('DeleterId')->nullable();
            $table->timestampTz('DeletionTime')->nullable();
        });

        Schema::table("HR_EmployeeLoansPayRoll", function (Blueprint $table) {
            $table->boolean('IsDeleted')->default(false);
            $table->integer('DeleterId')->nullable();
            $table->timestampTz('DeletionTime')->nullable();
        });

        Schema::table("HR_EmployeeOffSiteWorkPlace", function (Blueprint $table) {
            $table->boolean('IsDeleted')->default(false);
            $table->integer('DeleterId')->nullable();
            $table->timestampTz('DeletionTime')->nullable();
        });

        Schema::table("HR_EmployeePenalty", function (Blueprint $table) {
            $table->boolean('IsDeleted')->default(false);
            $table->integer('DeleterId')->nullable();
            $table->timestampTz('DeletionTime')->nullable();
        });

        Schema::table("HR_EmployeePosition", function (Blueprint $table) {
            $table->boolean('IsDeleted')->default(false);
            $table->integer('DeleterId')->nullable();
            $table->timestampTz('DeletionTime')->nullable();
        });

        Schema::table("HR_EmployeePositionPayRolls", function (Blueprint $table) {
            $table->boolean('IsDeleted')->default(false);
            $table->integer('DeleterId')->nullable();
            $table->timestampTz('DeletionTime')->nullable();
        });

        Schema::table("HR_EmployeePromotion", function (Blueprint $table) {
            $table->boolean('IsDeleted')->default(false);
            $table->integer('DeleterId')->nullable();
            $table->timestampTz('DeletionTime')->nullable();
        });

        Schema::table("HR_EmployeeStudy", function (Blueprint $table) {
            $table->boolean('IsDeleted')->default(false);
            $table->integer('DeleterId')->nullable();
            $table->timestampTz('DeletionTime')->nullable();
        });

        Schema::table("HR_EmployeeWorkPlace", function (Blueprint $table) {
            $table->boolean('IsDeleted')->default(false);
            $table->integer('DeleterId')->nullable();
            $table->timestampTz('DeletionTime')->nullable();
        });

        Schema::table("HR_EmployeeClassificationBranch", function (Blueprint $table) {
            $table->boolean('IsDeleted')->default(false);
            $table->integer('DeleterId')->nullable();
            $table->timestampTz('DeletionTime')->nullable();
        });

        Schema::table("HR_EmployeeEfad", function (Blueprint $table) {
            $table->boolean('IsDeleted')->default(false);
            $table->integer('DeleterId')->nullable();
            $table->timestampTz('DeletionTime')->nullable();
        });

        Schema::table("HR_EmployeeEntitlementPayRoll", function (Blueprint $table) {
            $table->boolean('IsDeleted')->default(false);
            $table->integer('DeleterId')->nullable();
            $table->timestampTz('DeletionTime')->nullable();
        });

        Schema::table("HR_PayRollFinancialAllocations", function (Blueprint $table) {
            $table->boolean('IsDeleted')->default(false);
            $table->integer('DeleterId')->nullable();
            $table->timestampTz('DeletionTime')->nullable();
        });

        Schema::table("HR_EmployeeAcademicRank", function (Blueprint $table) {
            $table->boolean('IsDeleted')->default(false);
            $table->integer('DeleterId')->nullable();
            $table->timestampTz('DeletionTime')->nullable();
        });

        Schema::table("HR_EmployeeActivity", function (Blueprint $table) {
            $table->boolean('IsDeleted')->default(false);
            $table->integer('DeleterId')->nullable();
            $table->timestampTz('DeletionTime')->nullable();
        });

        Schema::table("HR_EmployeePromotionPayRoll", function (Blueprint $table) {
            $table->boolean('IsDeleted')->default(false);
            $table->integer('DeleterId')->nullable();
            $table->timestampTz('DeletionTime')->nullable();
        });
    }

    public function down()
    {
        Schema::table("HR_AuditDetails", function (Blueprint $table) {
            $table->dropColumn('IsDeleted');
            $table->dropColumn('DeleterId');
            $table->dropColumn('DeletionTime');
        });

        Schema::table("HR_AuditLogs", function (Blueprint $table) {
            $table->dropColumn('IsDeleted');
            $table->dropColumn('DeleterId');
            $table->dropColumn('DeletionTime');
        });

        Schema::table("HR_EmployeeAcademicRankPayRolls", function (Blueprint $table) {
            $table->dropColumn('IsDeleted');
            $table->dropColumn('DeleterId');
            $table->dropColumn('DeletionTime');
        });

        Schema::table("HR_EmployeeBankAccounts", function (Blueprint $table) {
            $table->dropColumn('IsDeleted');
            $table->dropColumn('DeleterId');
            $table->dropColumn('DeletionTime');
        });

        Schema::table("HR_EmployeeCertificatePayRoll", function (Blueprint $table) {
            $table->dropColumn('IsDeleted');
            $table->dropColumn('DeleterId');
            $table->dropColumn('DeletionTime');
        });

        Schema::table("HR_EmployeeClassificationPayRoll", function (Blueprint $table) {
            $table->dropColumn('IsDeleted');
            $table->dropColumn('DeleterId');
            $table->dropColumn('DeletionTime');
        });

        Schema::table("HR_EmployeeFamilyInfo", function (Blueprint $table) {
            $table->dropColumn('IsDeleted');
            $table->dropColumn('DeleterId');
            $table->dropColumn('DeletionTime');
        });

        Schema::table("HR_EmployeeFamilyInfoPayRoll", function (Blueprint $table) {
            $table->dropColumn('IsDeleted');
            $table->dropColumn('DeleterId');
            $table->dropColumn('DeletionTime');
        });

        Schema::table("HR_EmployeeIdentificationCards", function (Blueprint $table) {
            $table->dropColumn('IsDeleted');
            $table->dropColumn('DeleterId');
            $table->dropColumn('DeletionTime');
        });

        Schema::table("HR_EmployeeLeavesCredits", function (Blueprint $table) {
            $table->dropColumn('IsDeleted');
            $table->dropColumn('DeleterId');
            $table->dropColumn('DeletionTime');
        });

        Schema::table("HR_EmployeeLoansPayRoll", function (Blueprint $table) {
            $table->dropColumn('IsDeleted');
            $table->dropColumn('DeleterId');
            $table->dropColumn('DeletionTime');
        });

        Schema::table("HR_EmployeeOffSiteWorkPlace", function (Blueprint $table) {
            $table->dropColumn('IsDeleted');
            $table->dropColumn('DeleterId');
            $table->dropColumn('DeletionTime');
        });

        Schema::table("HR_EmployeePenalty", function (Blueprint $table) {
            $table->dropColumn('IsDeleted');
            $table->dropColumn('DeleterId');
            $table->dropColumn('DeletionTime');
        });

        Schema::table("HR_EmployeePosition", function (Blueprint $table) {
            $table->dropColumn('IsDeleted');
            $table->dropColumn('DeleterId');
            $table->dropColumn('DeletionTime');
        });

        Schema::table("HR_EmployeePositionPayRolls", function (Blueprint $table) {
            $table->dropColumn('IsDeleted');
            $table->dropColumn('DeleterId');
            $table->dropColumn('DeletionTime');
        });

        Schema::table("HR_EmployeePromotion", function (Blueprint $table) {
            $table->dropColumn('IsDeleted');
            $table->dropColumn('DeleterId');
            $table->dropColumn('DeletionTime');
        });

        Schema::table("HR_EmployeeStudy", function (Blueprint $table) {
            $table->dropColumn('IsDeleted');
            $table->dropColumn('DeleterId');
            $table->dropColumn('DeletionTime');
        });

        Schema::table("HR_EmployeeWorkPlace", function (Blueprint $table) {
            $table->dropColumn('IsDeleted');
            $table->dropColumn('DeleterId');
            $table->dropColumn('DeletionTime');
        });

        Schema::table("HR_EmployeeClassificationBranch", function (Blueprint $table) {
            $table->dropColumn('IsDeleted');
            $table->dropColumn('DeleterId');
            $table->dropColumn('DeletionTime');
        });

        Schema::table("HR_EmployeeEfad", function (Blueprint $table) {
            $table->dropColumn('IsDeleted');
            $table->dropColumn('DeleterId');
            $table->dropColumn('DeletionTime');
        });

        Schema::table("HR_EmployeeEntitlementPayRoll", function (Blueprint $table) {
            $table->dropColumn('IsDeleted');
            $table->dropColumn('DeleterId');
            $table->dropColumn('DeletionTime');
        });

        Schema::table("HR_PayRollFinancialAllocations", function (Blueprint $table) {
            $table->dropColumn('IsDeleted');
            $table->dropColumn('DeleterId');
            $table->dropColumn('DeletionTime');
        });

        Schema::table("HR_EmployeeAcademicRank", function (Blueprint $table) {
            $table->dropColumn('IsDeleted');
            $table->dropColumn('DeleterId');
            $table->dropColumn('DeletionTime');
        });

        Schema::table("HR_EmployeeActivity", function (Blueprint $table) {
            $table->dropColumn('IsDeleted');
            $table->dropColumn('DeleterId');
            $table->dropColumn('DeletionTime');
        });

        Schema::table("HR_EmployeePromotionPayRoll", function (Blueprint $table) {
            $table->dropColumn('IsDeleted');
            $table->dropColumn('DeleterId');
            $table->dropColumn('DeletionTime');
        });

        Schema::table("HR_EmployeeWorkPlace", function (Blueprint $table) {
            $table->dropColumn('IsDeleted');
            $table->dropColumn('DeleterId');
            $table->dropColumn('DeletionTime');
        });
    }
}
