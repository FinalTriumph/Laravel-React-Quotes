import React from 'react';
import RandomQuoteContainer from '../containers/RandomQuoteContainer.jsx';
import SectionTitle from '../components/SectionTitle.jsx';

export default function Welcome({ sources }) {
    if (!sources) {
        return (null);
    }

    return (
        <div className="text-left">
            <SectionTitle title="Random Quotes" />
            <div className="grid grid-cols-2">
                {Object.entries(sources).map(([key, value]) => (
                    <RandomQuoteContainer
                        key={key}
                        source={key}
                        sourceTitle={value.title}
                    />
                ))}
            </div>
        </div>
    );
}
