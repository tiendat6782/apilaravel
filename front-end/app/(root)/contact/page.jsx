import { ChevronRight, Mail } from "lucide-react";
import React from "react";

const Page = () => {
  return (
    <div>
      <p className="text_primary text-center text-3xl font-semibold">
        Ruby Store giúp gì đượcc cho bạn ?
      </p>
      <br />

      <p className="text_secondary text-center text-xl font-semibold">
        Chúng tôi mang lại trải nghiệm mua sắm tốt nhất cho bạn.
      </p>

      <div className="background_secondary p-5">
        <div className="flex_start">
          <Mail className="text_primary w-8" />
          <p className="text_primary font-semibold"> Sales</p>
        </div>
        <p className="text_secondary mt-5 font-normal">
          Liên hệ với bộ phận sale để biết thêm về giá cả, tư vấn về các sản
          phẩm
        </p>
        <button className="text_secondary flex_start border_primary background_primary mt-5 rounded-full border px-3 py-0.5 font-semibold">
          Liên hệ sales
          <ChevronRight className=" w-4" />
        </button>
      </div>
    </div>
  );
};

export default Page;
