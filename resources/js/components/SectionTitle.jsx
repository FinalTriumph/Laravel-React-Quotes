import React from 'react';

export default function SectionTitle({ title }) {
    if (!title) {
        return (null);
    }

    return (
        <div className="px-10 py-4 mb-4 bg-custom-primary-2 shadow rounded-lg">
            <p className="font-bold text-lg">{title}</p>
        </div>
    );
}