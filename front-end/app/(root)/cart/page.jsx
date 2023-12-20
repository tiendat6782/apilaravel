import PaymentInfo from "@/components/shared/PaymentInfo";
import PaymentPrice from "@/components/shared/PaymentPrice";
import CartTable from "@/components/shared/table/CartTable";
import { Separator } from "@/components/ui/separator";
import React from "react";

const Page = () => {
  return (
    <div>
      <CartTable />
      <Separator className="mt-5" />
      <PaymentPrice />
      <PaymentInfo />
    </div>
  );
};

export default Page;
